<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdditionalData\CreateAdditionalDataRequest;
use App\Http\Requests\Backend\AdditionalData\UpdateAdditionalDataRequest;
use App\Repositories\Backend\AdditionalData\AdditionalDataRepository;
use App\Repositories\Backend\Evaluation\EvaluationRepository;

class AdditionalDataController extends Controller
{
    /**
     * AdditionalDataController constructor.
     */
    public function __construct(){
        $this->additionalData = new AdditionalDataRepository;
        $this->evaluationRepository = new EvaluationRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $request->session()->put('lastpage', $request->only('page')['page']);

        $f_submit = $request->input('f_submit', '');

        $name = getValueSession($request, 'AdditionalDataController@index:name', '', $f_submit, '');

        $additionalData = $this->additionalData->getPaginated(NULL, $name);

        return view('backend.additional_data.index', compact('additionalData', 'name'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $userWithEvaluation = $this->additionalData->getEvaluations();
        return view('backend.additional_data.create', compact('measures', 'userWithEvaluation'));
    }

    /**
     * @param CreateAdditionalDataRequest $request
     * @return mixed
     */
    public function store(CreateAdditionalDataRequest $request){
        if($this->additionalData->create($request)){
            return redirect()->route('backend.additional_data.index')
                ->withFlashSuccess(trans('alerts.additional_data.created'));
        }
        return redirect()
            ->route('backend.additional_data.create')
            ->withInput()
            ->withFlashSuccess(trans('alerts.additional_data.error'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\GeneralException
     */
    public function edit($id){
        $additionalData = $this->additionalData->findOrThrowException($id);
        $userWithTest = $this->additionalData->getEvaluations();
        $evaluations = $this->evaluationRepository->allOfUser($additionalData->evaluation->user->id);
        return view('backend.additional_data.edit', compact('additionalData', 'userWithTest', 'evaluations'));
    }

    /**
     * @param $id
     * @param UpdateAdditionalDataRequest $request
     * @return mixed
     */
    public function update($id, UpdateAdditionalDataRequest $request){
        if($this->additionalData->update($id, $request)){
            return redirect()->route('backend.additional_data.index')
                ->withFlashSuccess(trans('alerts.additional_data.updated'));
        }
        return redirect()
            ->route('backend.additional_data.edit')
            ->withInput()
            ->withFlashSuccess(trans('alerts.additional_data.upated_error'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id){
        if($this->additionalData->destroy($id)){
            return redirect()->route('backend.additional_data.index')
                ->withFlashSuccess(trans('alerts.additional_data.deleted'));
        }
        return redirect()
            ->route('backend.additional_data.index')
            ->withFlashSuccess(trans('alerts.additional_data.delete_error'));
    }
}
