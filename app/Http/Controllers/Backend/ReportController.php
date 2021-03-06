<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Auth\AuthRepository;
use App\Repositories\Backend\Test\TestRepository;

/**
 * Class ReportController
 * @package App\Http\Controllers\Backend
 */
class ReportController extends Controller
{
    /**
     * @var AuthRepository
     */
    protected $authRepository;

    /**
     * @var TestRepository
     */
    protected $testRepository;

    /**
     * ReportController constructor.
     */
    public function __construct(){
        $this->authRepository = new AuthRepository;
        $this->testRepository = new TestRepository;
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tests($id, Request $request){
        $this->authorize('backend.reports.simple.tests');
        $user = $this->authRepository->find($id);
        return view('backend.reports.simple.tests', compact('user'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function evaluations($id, Request $request){
        $this->authorize('backend.reports.simple.evaluations');
        $user = $this->authRepository->find($id);
        return view('backend.reports.simple.evaluations', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function simple(Request $request)
    {
        $this->authorize('backend.reports.simple.simple');
        //$request->session()->put('lastpage', $request->only('page')['page']);
        $f_submit = $request->input('f_submit', '');
        $name = getValueSession($request, 'Backend/ReportController@index:name', '', $f_submit, '');
        $email = getValueSession($request, 'Backend/ReportController@index:email', '', $f_submit, '');
        $cpf = getValueSession($request, 'Backend/ReportController@index:cpf', '', $f_submit, '');
        $rg = getValueSession($request, 'Backend/ReportController@index:rg', '', $f_submit, '');
        $profile = getValueSession($request, 'Backend/ReportController@index:profile', '', $f_submit, '');
        if(empty($profile)){
            $profile = [];
        }
        $profile = array_map('intval', $profile);
        $roles = $this->authRepository->roles();
        $users = $this->authRepository->getPaginated(NULL, [
            'name' => ['op' => 'like', 'value' => '%'.$name.'%'],
            'email' => ['op' => 'like', 'value' => '%'.$email.'%'],
            'cpf' => ['op' => '=', 'value' => $cpf],
            'rg' => ['op' => '=', 'value' => $rg],
            'role_id' => ['op' => 'In', 'value' => $profile]
        ], ['evaluations' => 'NULL']);


        return view('backend.reports.simple.simple', compact(
            'roles', 'users', 'name', 'email', 'cpf', 'rg', 'profile'
        ));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('backend.reports.index');
        $request->session()->put('lastpage', $request->only('page')['page']);
        $f_submit = $request->input('f_submit', '');
        $name = getValueSession($request, 'Backend/ReportController@index:name', '', $f_submit, '');
        $email = getValueSession($request, 'Backend/ReportController@index:email', '', $f_submit, '');
        $cpf = getValueSession($request, 'Backend/ReportController@index:cpf', '', $f_submit, '');
        $rg = getValueSession($request, 'Backend/ReportController@index:rg', '', $f_submit, '');
        $profile = getValueSession($request, 'Backend/ReportController@index:profile', '', $f_submit, '');
        if(empty($profile)){
            $profile = [];
        }
        $profile = array_map('intval', $profile);
        $roles = $this->authRepository->roles();
        $users = $this->authRepository->getPaginated(NULL, [
            'name' => ['op' => 'like', 'value' => '%'.$name.'%'],
            'email' => ['op' => 'like', 'value' => '%'.$email.'%'],
            'cpf' => ['op' => '=', 'value' => $cpf],
            'rg' => ['op' => '=', 'value' => $rg],
            'role_id' => ['op' => 'In', 'value' => $profile]
        ], [0 => 'tests']);

        return view('backend.reports.index', compact(
            'roles', 'users', 'name', 'email', 'cpf', 'rg', 'profile'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('backend.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('backend.reports.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
