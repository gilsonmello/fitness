<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use File;
use App;
use PDF;
use App\Repositories\Backend\Evaluation\EvaluationRepository;
use App\Repositories\Backend\Auth\AuthRepository;

class SendEmailController extends Controller
{
    public function __construct(){
        $this->evaluationRepository = new EvaluationRepository;
        $this->authRepository = new AuthRepository;
    }

    /**
     * @param $id
     * @param Request $request
     */
    public function evaluations($id, Request $request){
        $data = $request->all();
        unset($data['_token']);
        if(count($data) > 0){

            if(!File::exists(public_path().'/uploads/reports/')){
                File::makeDirectory(public_path().'/uploads/reports/tmp/', 0777, true, true);
            }

            $user = $this->authRepository->find($id);
        
            $hash = str_random(10).'_'.$user->email.'.pdf';
            $path = public_path().'/uploads/reports/tmp/';
            
            $upload = $this->uploadPdf('emails.report_simple', [
                'evaluation' => currentEvaluation($user->id)
            ], $path, $hash);

            if($upload) {
                foreach($data['email'] as $value){
                    Mail::send('emails.informative_text', [], function($message) use ($value, $path, $hash){
                        $message->to($value);
                        $message->subject('Relatório de Avaliação Física');
                        $message->attach($path.$hash);
                    });
                }
            }
            File::delete($path.$hash);
        }
    	return redirect()->route('backend.reports.simple')->withFlashSuccess('E-mail enviado com sucesso');
    }

    protected function uploadPdf($blade, array $data, $path, $hash){
        $pdf = PDF::loadView($blade, $data);
        return $pdf->save($path.$hash);
    }
}
