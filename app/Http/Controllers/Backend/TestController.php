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
        $maximumHeartRates = $this->testRepository->getMaximumHeartRate($id);

        $protocols_id = [];

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



        return view('backend.tests.edit', compact('test', 'protocols', 'protocols_id', 'maximumHeartRate', 'minimumHeartRates'));
    }


    /**
     * @param $id
     * @throws \App\Exceptions\GeneralException
     */
    public function findProtocol($id){
        $protocol = $this->testRepository->findProtocol($id);
        return die(
            json_encode([
                'id' => $protocol->id,
                'name' => $protocol->name,
                'formula' => $protocol->formula
            ])
        );
    }

    /**
     * @param $id
     * @param Request $request
     */
    public function saveFrequenciaCardiacaMaxima($id, Request $request){
        if($this->testRepository->saveFrequenciaCardiacaMaxima($id, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    /**
     * @param $test_id
     * @param $protocol_id
     */
    public function destroyFrequenciaCardiacaMaxima($test_id, $protocol_id){
        if($this->testRepository->destroyFrequenciaCardiacaMaxima($test_id, $protocol_id)){
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
}
