<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{

    /**
     * @param $id
     * @param Request $request
     */
    public function tests($id, Request $request){
    	$data = $request->all();
    	unset($data['_token']);
    	foreach($data['email'] as $value){
			Mail::send('emails.teste', [], function($message) use ($value)
            {
                $message->from('junior140._-@htomail.com', 'Christian Nwamba');
                $message->to($value, 'Teste');
                $message->subject('Test');
            });
    	}
    	return redirect()->route('backend.reports.index');
    }
}
