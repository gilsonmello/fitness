<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\API\Order;
use App\Model\API\Diary;
use App\Model\API\DiaryHour;


class OrderController extends Controller
{
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
    public function verifyDateAndHour(Request $request)
    {
        $data = $request->all();


        $diary = Diary::where('available_date', '=', $data['available_date'])
        ->where('is_active', '=', 1)
        ->get()
        ->first();

        $diaryHour = DiaryHour::where('available_hour', '=', $data['available_hour'])
        ->where('is_active', '=', 1)
        ->get()
        ->first();


        if(is_null($diary)){
            return response()->json("Por favor, clique em editar para escolher outra data para agendamento.", 400);
        }

        if(is_null($diaryHour)){
            return response()->json("Por favor, clique em editar para escolher outra hora para agendamento.", 400);
        }

        if(is_null($diary) && is_null($diaryHour)){
            return response()->json("Por favor, clique em editar para escolher outra data e horário para agendamento.", 400);
        }

        dd($diary, $diaryHour);

        return response()->json('false', 400);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $user_id)
    {
        $data = $request->all();

        $order = Order::where('user_id', '=', $user_id);

        if(isset($data['available_date']) && !empty($data['available_date'])){
            $diary = Diary::where('available_date', '=', $data['available_date'])->get()->first();

            $order->where('diary_id', '=', $diary->id);
        }

        if(isset($data['available_hour']) && !empty($data['available_hour'])){
            $diaryHour = DiaryHour::where('available_hour', '=', $data['available_hour'])->get()->first();
            $order->where('diary_hour_id', '=', $diaryHour->id);
        }

        $order = $order
        ->with('supplier')
        ->with('diary')
        ->with('diaryHour')
        ->with('user')
        ->get()
        ->first();

        if(!is_null($order)){
            return response()->json($order, 200);
        }

        return response()->json('false', 400);

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
