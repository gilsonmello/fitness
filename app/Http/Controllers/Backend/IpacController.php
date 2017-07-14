<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Ipac\CreateIpacRequest;
use App\Http\Requests\Backend\Ipac\UpdateIpacRequest;
use App\Http\Requests\Backend\Ipac\CreateIpacAnswerRequest;
use App\Repositories\Backend\Ipac\IpacRepository;
use App\Repositories\Backend\QuestionGroup\QuestionGroupRepository;
use App\Repositories\Backend\User\UserRepository;

class IpacController extends Controller{

    protected $ipac;

    protected $questionGroup;

    protected $user;

    public function __construct(UserRepository $user, IpacRepository $ipac, QuestionGroupRepository $questionGroup){
        $this->user = $user;
        $this->ipac = $ipac;
        $this->questionGroup = $questionGroup;
    }

    public function index(Request $request){

        $request->session()->put('lastpage', $request->only('page')['page']);

        $f_submit = $request->input('f_submit', '');

        //$title = getValueSession($request, 'IpacController@index:title', '', $f_submit, '');

        $ipacs = $this->ipac->getIpacPaginated(NULL);
        return view('backend.ipacs.index', compact('title', 'ipacs'));
    }

    public function create(){
        $questionGroup = $this->questionGroup->all();
        $users = $this->user->all();
        return view('backend.ipacs.create', compact('questionGroup', 'users'));
    }

    public function store(CreateIpacRequest $request){
        if($this->ipac->create($request)){
            return redirect()
                ->route('backend.ipacs.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withInput()
                ->withFlashSuccess(trans('alerts.ipacs.created'));
        }
    }

    public function destroy($id){
        if($this->ipac->destroy($id)){
            return redirect()
                ->route('backend.ipacs.index')
                ->withFlashSuccess(trans("alerts.ipacs.deleted"));
        }
        throw new GeneralException('Operação Invalidada');
    }

    public function edit($id){
        $groupQuestions = $this->questionGroup->all();
        $users = $this->user->all();
        $ipac = $this->ipac->findOrThrowException($id);
        return view('backend.ipacs.edit', compact('ipac', 'groupQuestions', 'users'));
    }

    public function update($id, UpdateIpacRequest $request){
        if($this->ipac->update($id, $request)){
            return redirect()->route('backend.ipacs.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withFlashSuccess(trans('alerts.ipacs.updated'))
                ->withInput();
        }
    }

    public function answer($id){
        $ipac = $this->ipac->findOrThrowException($id);
        $groupQuestions = $this->questionGroup->all();
        $users = $this->user->all();
        return view('backend.ipacs.answer', compact('ipac', 'groupQuestions', 'users'));
    }

    public function ipacAnswer($id, CreateIpacAnswerRequest $request){
        if($this->ipac->createIpacAnswer($id, $request)){
            return redirect()->route('backend.ipacs.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withFlashSuccess(trans('alerts.ipacs.answer'))
                ->withInput();
        }
    }
}
