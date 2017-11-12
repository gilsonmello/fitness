<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.home');
    }
}
