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

    public function create(){
        $users = $this->userRepository->all();
        return view('backend.tests.create', compact('users'));
    }

    public function store(CreateTestRequest $request){
        if($this->testRepository->create($request)){
            return redirect()->route('backend.tests.index')
                ->withFlashSuccess(trans('alerts.tests.create'));
        }
        return redirect()->route('backend.tests.create')
            ->withInput()
            ->withFlashSuccess(trans('alerts.tests.create_erro'));
    }

    public function destroy($id){

    }

    public function update($id, UpdateTestRequest $request){

    }

    public function index(){
        $tests = $this->testRepository->all();
        return view('backend.tests.index', compact('tests'));
    }

    public function edit($id){
        $test = $this->testRepository->findOrThrowException($id);
        $protocols = $this->testRepository->getProtocols();
        $maximumHeartRates = $this->testRepository->getMaximumHeartRate($id);
        $protocols_id = [];
        foreach($maximumHeartRates as $maximumHeartRate){
            $protocols_id[] = $maximumHeartRate->protocol->id;
        }
        return view('backend.tests.edit', compact('test', 'protocols', 'maximumHeartRate', 'protocols_id'));
    }

    public function findProtocol($id){
        $protocol = $this->testRepository->getProtocol($id);
        return die(
            json_encode([
                'id' => $protocol->id,
                'name' => $protocol->name,
                'formula' => $protocol->formula
            ])
        );
    }

    public function saveFrequenciaCardiacaMaxima($id, Request $request){
        if($this->testRepository->saveFrequenciaCardiacaMaxima($id, $request)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }

    public function destroyFrequenciaCardiacaMaxima($teste_id, $protocol_id){
        if($this->testRepository->destroyFrequenciaCardiacaMaxima($teste_id, $protocol_id)){
            return die(json_encode('true'));
        }
        return die(json_encode('false'));
    }
}
