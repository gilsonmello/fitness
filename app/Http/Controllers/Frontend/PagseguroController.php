<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Frontend\Order;
use Illuminate\Http\Request;
use App\Model\Frontend\Diary;
use App\Model\Frontend\DiaryHour;
use App\Model\Frontend\Package;
use App\User;
use App\Schedule;
use App\Http\Controllers\Controller;
use App\Services\Frontend\Payment\PaymentService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class PagseguroController extends Controller
{
    use PaymentService;

    private function updateFromPagseguroFeedback($dataXml) {
        dd($dataXml);
        if (isset($dataXml->code)) {
            $transaction = new Transaction;
            $transaction->order_id = $dataXml->reference;
            $transaction->payment_hub = 'pagseguro';
            $transaction->payment_id = $dataXml->code;
            $transaction->payment_method = $dataXml->paymentMethod->type;
            $transaction->payment_code = $dataXml->paymentMethod->code;
            $transaction->installment_fee_amount = $dataXml->installmentFeeAmount;
            $transaction->installment_count = $dataXml->installmentCount;
            $transaction->discount_amount = $dataXml->discountAmount;
            $transaction->status_id = $dataXml->status;
            $transaction->gross_amount = $dataXml->grossAmount;
            $transaction->net_amount = $dataXml->netAmount;
            $transaction->operational_fee_amount = $dataXml->operationalFeeAmount;
            $transaction->intermediation_fee_amount = $dataXml->intermediationFeeAmount;
            $transaction->intermediation_fee_rate = $dataXml->intermediationRateAmount;
            $transaction->escrow_date = $dataXml->escrowEndDate;
            $transaction->save();
        }

            
        //Pegando o id do pedido            
        $order = Order::find($dataXml->reference);

        if (in_array($dataXml->reference, [1, 2])){
            $order->status_payment_id = $dataXml->reference;
        }

        if ($order->date_confirmation == null) {
            $order->date_confirmation = Carbon::now();
        }

        if (in_array($dataXml->status, [5, 6, 7])) {
            $order->status_payment_id = $dataXml->status;

            // Disable enrollments
            $schedules = Schedule::where('order_id', $order->id)->get();
            if (count($schedules) > 0) {
                foreach ($schedules as $schedule) {
                    $schedule->is_active = 0;
                    $schedule->save();
                }
            }
        }

        //Verifico se o pagamento foi aprovado
        if (in_array($dataXml->status, [3, 4]) && ($order->status_payment_id != 4 || $order->status_payment_id != 3)) {
            $order->status_payment_id = $dataXml->status;
            if (count($order->packages) > 0) {
                $items = Package::whereIn('package_id', $order->packages->lists('package_id'))->get();
                $this->createSchedule($items, $order);
            }
        }
    }

    private function createSchedule($items, $order){
        foreach($items as $item){
            $schedule = new Schedule;
            $schedule->order_id = $order->id;
            $schedule->user_id = $order->user->id;
            $schedule->diary_id = $order->diary->id;
            $schedule->diary_hour_id = $order->diaryHour->id;
            $schedule->package_id = $item->id;
            $schedule->date_begin = Carbon::now();
            $schedule->date_end = Carbon::now()->addDays(30);
            $schedule->is_active = 1;

            $schedule->save();
        }
    }

    public function notifications(Request $request){
        //file_put_contents(public_path() . '/teste/'.date('d_m_Y__H_i_s'), $data);
        ////////////// To tests //////////////

        Log::info($_POST);
        $code = $_POST['notificationCode'];

        ////////////// To tests //////////////
        //$code = '7F7AA96F474A474A222664BC9F8EFA8680C4';

        $request = [
            'url' => 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/'.$code.'?email=miranda.fitness.avaliacao@gmail.com&token=C900DDAA8A04452AA119B81709A67FA9',
            'params' => [
                'email' => 'miranda.fitness.avaliacao@gmail.com',
                'token' => 'C900DDAA8A04452AA119B81709A67FA9'
            ]
        ];

        //$request = Request::create($request['url'], 'get', $request['params']);
        //$response = Route::dispatch( $request );

        //Log::inf($response);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $request['url']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'application/x-www-form-urlencoded; charset=ISO-8859-1']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if (app()->environment() == 'production') {
            curl_setopt($ch, CURLUSESSL_TRY, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        } else {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }

        $result = curl_exec($ch);

        curl_close($ch);
        
        //$response = \HttpClient::get($request);
        //$dataXml = $response->xml();

        $dataXml = simplexml_load_string($result);
        
        //$result = (array) $result;

        $this->updateFromPagseguroFeedback($dataXml);

    }

    public function payment(Request $request){
        $items = $this->getCheckout($request->all());
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'application/x-www-form-urlencoded; charset=ISO-8859-1']);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($items));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if (app()->environment() == 'production') {
            curl_setopt($ch, CURLUSESSL_TRY, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        } else {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }

        $result = curl_exec($ch);
        return response()->json($result, 200);
    }

    public function generateOrder(Request $request){
        
        $data = $request->all();

        $user = User::find($data['user_id']);

        $available_date = $data['year'].'-'.$data['month'].'-'.$data['day'];

        $available_hour = $data['hour'].':'.$data['minute'];
        
        $diary = Diary::where('available_date', '=', $available_date)
        ->where('is_active', '=', 1)
        ->get()
        ->first();

        $diary_hour = DiaryHour::where('available_hour', '=', $available_hour)
        ->where('diary_id', '=', $diary->id)
        ->where('is_active', '=', 1)
        ->get()
        ->first();
        
        $package = Package::find($data['package_id']);
        
        $order = new Order();
        $order->user_id = $user->id;
        $order->diary_id = $diary->id;
        $order->diary_hour_id = $diary_hour->id;
        $order->value = $package->value;
        $order->value_discount = $package->value;
        $order->coupon_id = NULL;


        //$diary_hour->is_active = 0;
        //$diary_hour->save();

        //if($diary->hours->count() == 0){
            //$diary->is_active = 0;
            //$diary->save();
        //}

        if($order->save()){
            $order->packages()->attach($package->id, [
                'price' => $package->value,
                'discount_price' => $package->value
            ]);


            $arr = [];
            $arr['order_id'] = $order->id;
            $arr['user'] = $user;
            $arr['items'] = $package;
            return response()->json($arr, 200);
        }
        return response()->json('false', 200);
    }

    public function getView(){
        $session_id = $this->getSessionId();
        $session_id = $session_id->getData()->id;
        return view('frontend.pagseguro.index', compact('session_id'));
    }

    public function getSessionId(){
        
        $credentials = array(
            'email' => 'miranda.fitness.avaliacao@gmail.com',
            'token' => 'C900DDAA8A04452AA119B81709A67FA9'
        );

        $data = '';
        foreach ($credentials as $key => $value) {
            $data .= $key . '=' . $value . '&';
        }

        $data = rtrim($data, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions');
        curl_setopt($ch, CURLOPT_POST, count($credentials));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (app()->environment() == 'production') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        } else {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }
        $result = curl_exec($ch);

        if (FALSE === $result)
            throw new GeneralException(curl_error($ch) . curl_errno($ch));

        $result = simplexml_load_string(curl_exec($ch));
        
        curl_close($ch);
        
        $result = (array) $result;

        //Session::put('pagseguro.sessionId', $result->id);
        return response()->json($result, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
