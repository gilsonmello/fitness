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
use App\Http\Requests\Backend\Evaluation\UpdateAnalisePosturalLateralEsquerdaRequest;
use App\Http\Requests\Backend\Evaluation\UpdateAnalisePosturalPosterior;
use App\Http\Requests\Backend\Evaluation\UpdateRiscoCoronarioRequest;
use App\Http\Requests\Backend\Evaluation\CreateEvaluationRequest;
use App\Http\Requests\Backend\Evaluation\UpdateEvaluationRequest;
use App\Services\UploadService\UploadService;
use Illuminate\Contracts\Filesystem\Filesystem;
use Auth;
use Imageupload;

/**
 * Class EvaluationController
 * @package App\Http\Controllers\Backend
 */
class EvaluationController extends Controller
{
    /**
     * EvaluationController constructor.
     * @param Filesystem $filesystem
     * @param UploadService $uploadService
     */
    public function __construct(Filesystem $filesystem, UploadService $uploadService){
        $this->userRepository = new UserRepository;
        $this->evaluationRepository = new EvaluationRepository;
        $this->uploadService = $uploadService;
        $this->filesystem = $filesystem;
    }

    public function allOfUser($id){
        return response()->json($this->evaluationRepository->allOfUser($id), 200);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){        
        $this->authorize('backend.evaluations.create');
        $users = $this->userRepository->allClients();
        return view('backend.evaluations.create', compact('users'));
    }

    /**
     * @param $id
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy($id){
        $this->authorize('backend.evaluations.destroy');
        if($this->evaluationRepository->destroy($id)){
            return redirect()
                ->route('backend.evaluations.index')
                ->withFlashSuccess(trans('alerts.evaluations.deleted'));
        }
        return redirect()
            ->route('backend.evaluations.index')
            ->withFlashSuccess(trans('alerts.evaluations.deleted_error'));
    }

    /**
     * @param $id
     * @param UpdateEvaluationRequest $request
     * @return mixed
     */
    public function update($id, UpdateEvaluationRequest $request){
        if($this->evaluationRepository->update($id, $request)){
            return redirect()
                ->route('backend.evaluations.edit', $id)
                ->withFlashSuccess(trans('alerts.evaluations.update.success'));
        }
        return redirect()
            ->route('backend.evaluations.create')
            ->withInput()
            ->withFlashSuccess(trans('alerts.evaluations.update.error'));
    }

    /**
     * @param CreateEvaluationRequest $request
     * @return mixed
     */
    public function store(CreateEvaluationRequest $request){
        if($this->evaluationRepository->create($request)){
            return redirect()
                ->route('backend.evaluations.index')
                ->withFlashSuccess(trans('alerts.evaluations.created'));
        }
        return redirect()
            ->route('backend.evaluations.create')
            ->withInput()
            ->withFlashSuccess(trans('alerts.evaluations.error'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\GeneralException
     */
    public function edit($id){
        $this->authorize('backend.evaluations.edit');
        $evaluation = $this->evaluationRepository->findOrThrowException($id);
        $users = $this->userRepository->allClients();
        return view('backend.evaluations.edit', compact('evaluation', 'users'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $this->authorize('backend.evaluations.index');
        $evaluations = $this->evaluationRepository->all();
        return view('backend.evaluations.index', compact('evaluations'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return json
     */
    public function updateAnthropometries($id, Request $request){
        $this->authorize('backend.evaluations.updateAnthropometries');
        if($this->evaluationRepository->updateAnthropometries($id, $request)){
            return die(json_encode("true"));
        }
        return die(json_encode("false"));
    }

    /**
     * @param $id
     * @param UpdateBioempedanciaRequest $request
     */
    public function updateBioempedancia($id, UpdateBioempedanciaRequest $request){
        $this->authorize('backend.evaluations.updateBioempedancia');
        if($this->evaluationRepository->updateBioempedancia($id, $request)){
            return die(json_encode("true"));
        }
        return die(json_encode("false"));
    }

    /**
     * @param $id
     * @param UpdateParqRequest $request
     * @return boolean
     */
    public function updateParq($id, UpdateParqRequest $request){
        $this->authorize('backend.evaluations.updateParq');
        if($this->evaluationRepository->updateParq($id, $request)){
            return die(json_encode("true"));
        }
        return die(json_encode("false"));
    }

    /**
     * @param $id
     * @param UpdatePregrasCutaneaRequest $request
     * @return boolean
     */
    public function updatePregrasCutaneas($id, UpdatePregrasCutaneaRequest $request){
        $this->authorize('backend.evaluations.updatePregrasCutaneas');
        if($this->evaluationRepository->updatePregrasCutaneas($id, $request)){
            return die(json_encode("true"));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param UpdateAnalisePosturalAnteriorRequest $request
     */
    public function updateAnalisePosturalAnterior($id, UpdateAnalisePosturalAnteriorRequest $request){
        $this->authorize('backend.evaluations.updateAnalisePosturalAnterior');
        if($this->evaluationRepository->updateAnalisePosturalAnterior($id, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param UpdateAnalisePosturalLateralEsquerdaRequest $request
     */
    public function updateAnalisePosturalLateralEsquerda($id, UpdateAnalisePosturalLateralEsquerdaRequest $request){
        $this->authorize('backend.evaluations.updateAnalisePosturalLateralEsquerda');
        if($this->evaluationRepository->updateAnalisePosturalLateralEsquerda($id, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param UpdateAnalisePosturalLateralEsquerdaRequest $request
     */
    public function updateAnalisePosturalLateralDireita($id, UpdateAnalisePosturalLateralEsquerdaRequest $request){
        $this->authorize('backend.evaluations.updateAnalisePosturalLateralDireita');
        if($this->evaluationRepository->updateAnalisePosturalLateralDireita($id, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param UpdateAnalisePosturalPosterior $request
     */
    public function updateAnalisePosturalPosterior($id, UpdateAnalisePosturalPosterior $request){
        $this->authorize('backend.evaluations.updateAnalisePosturalPosterior');
        if($this->evaluationRepository->updateAnalisePosturalPosterior($id, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param Request $request
     * @throws \App\Exceptions\GeneralException
     */
    public function sendImgAnalisePosturalAnterior($id, Request $request){
        if($request->hasFile('img')) {
            $evaluation = $this->evaluationRepository->findOrThrowException($id);
            $result = Imageupload::upload($request->file('img'), 'hash', '/tmp/'.$evaluation->id);
            if ($this->evaluationRepository->sendImgAnalisePosturalAnterior($id, $request, $result)) {
                return die(json_encode('true'));
            }
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param Request $request
     * @throws \App\Exceptions\GeneralException
     */
    public function sendImgAnalisePosturalLateralEsquerda($id, Request $request){
        if($request->hasFile('img')) {
            $evaluation = $this->evaluationRepository->findOrThrowException($id);
            $result = Imageupload::upload($request->file('img'), 'hash', '/tmp/'.$evaluation->id);
            if ($this->evaluationRepository->sendImgAnalisePosturalLateralEsquerda($id, $request, $result)) {
                return die(json_encode('true'));
            }
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param Request $request
     * @throws \App\Exceptions\GeneralException
     */
    public function sendImgAnalisePosturalLateralDireita($id, Request $request){
        if($request->hasFile('img')) {
            $evaluation = $this->evaluationRepository->findOrThrowException($id);
            $result = Imageupload::upload($request->file('img'), 'hash', '/tmp/'.$evaluation->id);
            if ($this->evaluationRepository->sendImgAnalisePosturalLateralDireita($id, $request, $result)) {
                return die(json_encode('true'));
            }
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param Request $request
     * @throws \App\Exceptions\GeneralException
     */
    public function sendImgAnalisePosturalPosterior($id, Request $request){
        if($request->hasFile('img')) {
            $evaluation = $this->evaluationRepository->findOrThrowException($id);
            $result = Imageupload::upload($request->file('img'), 'hash', '/tmp/'.$evaluation->id);
            if ($this->evaluationRepository->sendImgAnalisePosturalPosterior($id, $request, $result)) {
                return die(json_encode('true'));
            }
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param UpdateRiscoCoronarioRequest $request
     * @return json
     */
    public function updateRiscoCoronario($id, UpdateRiscoCoronarioRequest $request){
        $this->authorize('backend.evaluations.updateRiscoCoronario');
        if($this->evaluationRepository->updateRiscoCoronario($id, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }
}
