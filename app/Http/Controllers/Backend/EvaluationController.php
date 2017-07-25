<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\User\UserRepository;
use App\Http\Requests\Backend\User\UpdateWeightAndHeightRequest;
use App\Http\Requests\Backend\User\UpdateAntropometriaRequest;
use App\Http\Requests\Backend\User\UpdateBioempedanciaRequest;
use App\Repositories\Backend\Evaluation\EvaluationRepository;
use App\Http\Requests\Backend\Evaluation\UpdateParqRequest;
use App\Http\Requests\Backend\Evaluation\UpdatePregrasCutaneaRequest;
use App\Http\Requests\Backend\Evaluation\UpdateAnalisePosturalAnteriorRequest;
use App\Http\Requests\Backend\Evaluation\CreateEvaluationRequest;
use App\Services\UploadService\UploadService;
use Illuminate\Contracts\Filesystem\Filesystem;
use Auth;
use Imageupload;

class EvaluationController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    protected $evaluationRepository;

    /**
     * EvaluationController constructor.
     * @param UserRepository $userRepository
     * @param EvaluationRepository $evaluationRepository
     */
    public function __construct(UserRepository $userRepository, EvaluationRepository $evaluationRepository,  UploadService $uploadService, Filesystem $filesystem){
        $this->userRepository = $userRepository;
        $this->evaluationRepository = $evaluationRepository;
        $this->uploadService = $uploadService;
        $this->filesystem = $filesystem;
    }

    public function create(){
        $users = $this->userRepository->all();
        return view('backend.evaluations.create', compact('users'));
    }

    public function destroy($id){
        if($this->evaluationRepository->destroy($id)){
            return redirect()
                ->route('backend.evaluations.index')
                ->withFlashSuccess(trans('alerts.evaluations.deleted'));
        }
        return redirect()
            ->route('backend.evaluations.index')
            ->withFlashSuccess(trans('alerts.evaluations.deleted_error'));
    }

    public function store(CreateEvaluationRequest $request){
        if($this->evaluationRepository->create($request)){
            return redirect()
                ->route('backend.evaluations.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withFlashSuccess(trans('alerts.evaluations.created'));
        }
        return redirect()
            ->route('backend.evaluations.index', ['page' => $request->session()->get('lastpage', '1')])
            ->withFlashSuccess(trans('alerts.evaluations.error'));
    }

    public function edit($id){
        $evaluation = $this->evaluationRepository->findOrThrowException($id);
        return view('backend.evaluations.edit', compact('evaluation'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $evaluations = $this->evaluationRepository->all();
        return view('backend.evaluations.index', compact('evaluations'));
    }

    /**
     * @param $id
     * @param UpdateWeightAndHeightRequest $request
     * @return boolean
     */
    public function updateWeightAndHeight($id, UpdateWeightAndHeightRequest $request){
        if($this->userRepository->updateWeightAndHeight($id, $request)){
            die(json_encode("true"));
        }
        die(json_encode("false"));
    }

    /**
     * @param $id
     * @param UpdateAntropometriaRequest $request
     * @return boolean
     */
    public function updateAntropometria($id, UpdateAntropometriaRequest $request){
        if($this->userRepository->updateAntropometria($id, $request)){
            die(json_encode("true"));
        }
        die(json_encode("false"));
    }

    public function updateBioempedancia($id, UpdateBioempedanciaRequest $request){
        if($this->userRepository->updateBioempedancia($id, $request)){
            die(json_encode("true"));
        }
        die(json_encode("false"));
    }

    public function updateParq($id, UpdateParqRequest $request){
        if($this->evaluationRepository->updateParq($id, $request)){
            die(json_encode("true"));
        }
        die(json_encode("false"));
    }

    public function updatePregrasCutaneas($id, UpdatePregrasCutaneaRequest $request){
        if($this->evaluationRepository->updatePregrasCutaneas($id, $request)){
            die(json_encode("true"));
        }
        die(json_encode("false"));
    }

    public function updateAnalisePosturalAnterior($id, UpdateAnalisePosturalAnteriorRequest $request){
        if($request->hasFile('img')){

        }
    }

    public function sendImgAnalisePosturalAnterior($id, Request $request){
        if($request->hasFile('img')) {
            $evaluation = $this->evaluationRepository->findOrThrowException($id);
            $result = Imageupload::upload($request->file('img'), 'hash', '/analise_postural_anterior/'.$evaluation->id);
            if ($this->evaluationRepository->updateImgAnalisePosturalAnterior($id, $request, $result)) {
                return die(json_encode('true'));
            }
        }
        return die(json_encode('false'));
    }
}
