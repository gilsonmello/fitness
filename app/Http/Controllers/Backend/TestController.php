<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\User\UserRepository;
use App\Repositories\Backend\Test\TestRepository;
use App\Http\Requests\Backend\Test\CreateTestRequest;
use App\Http\Requests\Backend\Test\UpdateTestRequest;

/**
 * Class TestController
 * @package App\Http\Controllers\Backend
 */
class TestController extends Controller
{
    /**
     * TestController constructor.
     */
    public function __construct(){
        $this->userRepository = new UserRepository;
        $this->testRepository = new TestRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $users = $this->userRepository->all();
        return view('backend.tests.create', compact('users'));
    }

    /**
     * @param CreateTestRequest $request
     * @return mixed
     */
    public function store(CreateTestRequest $request){
        if($this->testRepository->create($request)){
            return redirect()->route('backend.tests.index')
                ->withFlashSuccess(trans('alerts.tests.create'));
        }
        return redirect()->route('backend.tests.create')
            ->withInput()
            ->withFlashSuccess(trans('alerts.tests.create_erro'));
    }

    /**
     * @param $id
     */
    public function destroy($id){
        if($this->testRepository->destroy($id)){
            return redirect()->route('backend.tests.index')
                ->withFlashSuccess(trans('alerts.tests.deleted'));
        }
        return redirect()
            ->route('backend.tests.index')
            ->withFlashSuccess(trans('alerts.tests.delete_error'));
    }

    /**
     * @param $id
     * @param UpdateTestRequest $request
     */
    public function update($id, UpdateTestRequest $request){

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $tests = $this->testRepository->all();
        return view('backend.tests.index', compact('tests'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function additionalData($id){
        $test = $this->testRepository->findOrThrowException($id);
        $additionalData = $this->testRepository->getAdditionalData($test->user->id);
        return view('backend.tests.additional_data.all', compact('additionalData', 'test'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        //Teste do usuário
        $test = $this->testRepository->findOrThrowException($id);

        $protocols = $this->testRepository->getProtocols();

        $additionalData = $this->testRepository->getAdditionalData($test->user->id);

        //ids dos protocolos utilizados do teste frequência cardíaca máxima
        $maximumHeartRates = $this->testRepository->getMaximumHeartRate($id)->pluck('protocol_id');

        /* Dados do teste Frequência Cardíaca Mínima */
        //ids dos protocolos utilizados do teste frequência cardíaca mínima
        $minimumHeartRates = $this->testRepository->getMinimumHeartRate($id)->pluck('protocol_id');
        /* Fim Dados do teste Frequência Cardíaca Mínima */

        //ids dos protocolos utilizados do teste frequência cardíaca reserrva
        $reserveHeartRates = $this->testRepository->getReserveHeartRate($id)->pluck('protocol_id');

        /* Dados do teste Vo 2 Máximo */
        //ids dos protocolos utilizados do teste vo 2 máximo
        $maximumVo2 = $this->testRepository->getMaximumVo2($id)->pluck('protocol_id');
        /* Fim dados do teste Vo 2 Máximo */

        /* Dados do teste Vo 2 Treino */
        //ids dos protocolos utilizados do teste vo 2 treino
        $trainingVo2 = $this->testRepository->getTrainingVo2($id)->pluck('protocol_id');
        /* Fim dados do teste Vo 2 Treino */

        /* Dados do teste Resistência */
        //ids dos protocolos utilizados do teste Resistência
        $resistances = $this->testRepository->getResistances($id)->pluck('protocol_id');
        /* Fim dados do teste Resistência */

        /* Dados do teste Resistência */
        //ids dos protocolos utilizados do teste Resistência
        $targetZone = $this->testRepository->getTargetZone($id)->pluck('protocol_id');
        /* Fim dados do teste Resistência */

        return view('backend.tests.edit', compact(
            'test',
            'protocols',
            'additionalData',
            'maximumHeartRates',
            'minimumHeartRates',
            'reserveHeartRates',
            'maximumVo2',
            'trainingVo2',
            'resistances',
            'targetZone'
        ));
    }


    /**
     * @param int $test_id
     * @param int $protocol_id
     * @return mixed json
     */
    public function findProtocol($test_id, $protocol_id){
        $protocol = $this->testRepository->findProtocolWithResult($test_id, $protocol_id);
        return die(
            json_encode([
                'id' => $protocol->id,
                'name' => $protocol->name,
                'formula' => $protocol->formula,
                'measure' => $protocol->measure->initials,
                'result' => isset($protocol->result) ? $protocol->result : '',
            ])
        );
    }

    public function getResistances($test_id, $type_resistance){

        $sequency = $this->testRepository->resistances($test_id, $type_resistance);
        if($sequency){
            return response()->json($sequency, 200);
        }
        return response()->json([], 400);
    }

    /**
     * @param $id
     * @param Request $request
     */
    public function saveMaximumHeartRate($id, Request $request){
        if($this->testRepository->saveMaximumHeartRate($id, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $test_id
     * @param $protocol_id
     */
    public function destroyMaximumHeartRate($test_id, $protocol_id){
        if($this->testRepository->destroyMaximumHeartRate($test_id, $protocol_id)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param Request $request
     */
    public function saveMinimumHeartRate($id, Request $request){
        if($this->testRepository->saveMinimumHeartRate($id, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $test_id
     * @param $protocol_id
     */
    public function destroyMinimumHeartRate($test_id, $protocol_id){
        if($this->testRepository->destroyMinimumHeartRate($test_id, $protocol_id)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param Request $request
     */
    public function saveReserveHeartRate($id, Request $request){
        if($this->testRepository->saveReserveHeartRate($id, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $test_id
     * @param $protocol_id
     */
    public function destroyReserveHeartRate($test_id, $protocol_id){
        if($this->testRepository->destroyReserveHeartRate($test_id, $protocol_id)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param Request $request
     */
    public function saveMaximumVo2($id, Request $request){
        if($this->testRepository->saveMaximumVo2($id, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $test_id
     * @param $protocol_id
     */
    public function destroyMaximumVo2($test_id, $protocol_id){
        if($this->testRepository->destroyMaximumVo2($test_id, $protocol_id)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param Request $request
     */
    public function saveTrainingVo2($id, Request $request){
        if($this->testRepository->saveTrainingVo2($id, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $test_id
     * @param $protocol_id
     */
    public function destroyTrainingVo2($test_id, $protocol_id){
        if($this->testRepository->destroyTrainingVo2($test_id, $protocol_id)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param Request $request
     */
    public function saveAdditionalData($id, Request $request){
        if($this->testRepository->saveAdditionalData($id, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $test_id
     * @param $type_resistance
     * @param Request $request
     */
    public function saveResistance($test_id, $type_resistance ,Request $request){
        if($this->testRepository->saveResistance($test_id, $type_resistance, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $test_id
     * @param $protocol_id
     */
    public function destroyResistance($test_id, $protocol_id){
        if($this->testRepository->destroyResistance($test_id, $protocol_id)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveTargetZone($id, Request $request){
        if($this->testRepository->saveTargetZone($id, $request)){
            return response()->json('true', 200);
        }
        return response()->json('false', 200);
    }

    /**
     * @param $test_id
     * @param $protocol_id
     */
    public function destroyTargetZone($test_id, $protocol_id){
        if($this->testRepository->destroyTargetZone($test_id, $protocol_id)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveFlexitests($id, Request $request){
        if($this->testRepository->saveFlexitests($id, $request)){
            return response()->json('true', 200);
        }
        return response()->json('false', 200);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveWellsBank($id, Request $request){
        if($this->testRepository->saveFlexitests($id, $request)){
            return response()->json('true', 200);
        }
        return response()->json('false', 200);
    }
}
