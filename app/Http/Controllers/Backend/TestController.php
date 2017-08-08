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
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\GeneralException
     */
    public function edit($id){

        $test = $this->testRepository->findOrThrowException($id);

        $protocols = $this->testRepository->getProtocols();

        $protocols_id = [];

        $maximumHeartRates = $this->testRepository->getMaximumHeartRate($id);
        if(count($maximumHeartRates) > 0) {
            foreach ($maximumHeartRates as $maximumHeartRate) {
                $protocols_id['maximumHeartRate'][] = $maximumHeartRate->protocol->id;
            }
        }else{
            $protocols_id['maximumHeartRate'][] = NULL;
        }

        $minimumHeartRates = $this->testRepository->getMinimumHeartRate($id);
        if(count($minimumHeartRates) > 0) {
            foreach ($minimumHeartRates as $minimumHeartRate) {
                $protocols_id['minimumHeartRate'][] = $minimumHeartRate->protocol->id;
            }
        }else{
            $protocols_id['minimumHeartRate'][] = NULL;
        }

        $reserveHeartRates = $this->testRepository->getReserveHeartRate($id);
        if(count($reserveHeartRates) > 0) {
            foreach ($reserveHeartRates as $reserveHeartRate) {
                $protocols_id['reserveHeartRate'][] = $reserveHeartRate->protocol->id;
            }
        }else{
            $protocols_id['reserveHeartRate'][] = NULL;
        }


        $maximumVo2 = $this->testRepository->getMaximumVo2($id);
        if(count($maximumVo2) > 0) {
            foreach ($maximumVo2 as $value) {
                $protocols_id['maximumVo2'][] = $value->protocol->id;
            }
        }else{
            $protocols_id['maximumVo2'][] = NULL;
        }

        $trainingVo2 = $this->testRepository->getTrainingVo2($id);
        if(count($trainingVo2) > 0) {
            foreach ($trainingVo2 as $value) {
                $protocols_id['trainingVo2'][] = $value->protocol->id;
            }
        }else{
            $protocols_id['trainingVo2'][] = NULL;
        }


        return view('backend.tests.edit', compact(
            'test',
            'protocols',
            'protocols_id'
        ));
    }


    /**
     * @param $id
     * @throws \App\Exceptions\GeneralException
     */
    public function findProtocol($test_id, $id){
        $protocol = $this->testRepository->findProtocol($test_id, $id);
        return die(
            json_encode([
                'id' => $protocol->id,
                'name' => $protocol->name,
                'formula' => $protocol->formula,
                'result' => isset($protocol->result) ? $protocol->result : '',
            ])
        );
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
}
