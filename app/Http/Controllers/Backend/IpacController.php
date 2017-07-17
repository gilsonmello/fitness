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
use App\IpacAnswer;

class IpacController extends Controller{

    /**
     * @var IpacRepository
     */
    protected $ipac;

    /**
     * @var QuestionGroupRepository
     */
    protected $questionGroup;

    /**
     * @var UserRepository
     */
    protected $user;


    /**
     * IpacController constructor.
     * @param UserRepository $user
     * @param IpacRepository $ipac
     * @param QuestionGroupRepository $questionGroup
     */
    public function __construct(UserRepository $user, IpacRepository $ipac, QuestionGroupRepository $questionGroup){
        $this->user = $user;
        $this->ipac = $ipac;
        $this->questionGroup = $questionGroup;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){

        $request->session()->put('lastpage', $request->only('page')['page']);

        $f_submit = $request->input('f_submit', '');

        //$title = getValueSession($request, 'IpacController@index:title', '', $f_submit, '');
        $ipacs = $this->ipac->getIpacPaginated(NULL);
        return view('backend.ipacs.index', compact('title', 'ipacs'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $questionGroup = $this->questionGroup->all();
        $users = $this->user->all();
        return view('backend.ipacs.create', compact('questionGroup', 'users'));
    }

    /**
     * @param CreateIpacRequest $request
     * @return mixed
     */
    public function store(CreateIpacRequest $request){
        if($this->ipac->create($request)){
            return redirect()
                ->route('backend.ipacs.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withInput()
                ->withFlashSuccess(trans('alerts.ipacs.created'));
        }
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy($id){
        if($this->ipac->destroy($id)){
            return redirect()
                ->route('backend.ipacs.index')
                ->withFlashSuccess(trans("alerts.ipacs.deleted"));
        }
        throw new GeneralException('Operação Invalidada');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\GeneralException
     */
    public function edit($id){
        $groupQuestions = $this->questionGroup->all();
        $users = $this->user->all();
        $ipac = $this->ipac->findOrThrowException($id);
        return view('backend.ipacs.edit', compact('ipac', 'groupQuestions', 'users'));
    }

    /**
     * @param $id
     * @param UpdateIpacRequest $request
     * @return mixed
     */
    public function update($id, UpdateIpacRequest $request){
        if($this->ipac->update($id, $request)){
            return redirect()->route('backend.ipacs.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withFlashSuccess(trans('alerts.ipacs.updated'))
                ->withInput();
        }
    }

    /**
     * Função para mostrar a tela de cadastro de resposta para o IPAC
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\GeneralException
     */
    public function answer($id){
        $ipac = $this->ipac->findOrThrowException($id);
        $groupQuestions = $this->questionGroup->all();
        $users = $this->user->all();
        return view('backend.ipacs.answer', compact('ipac', 'groupQuestions', 'users'));
    }

    /**
     * Função para cadastrar as respostas do IPAC
     * @param $id
     * @param CreateIpacAnswerRequest $request
     * @return mixed
     */
    public function createIpacAnswers($id, CreateIpacAnswerRequest $request){
        if($this->ipac->createIpacAnswers($id, $request)){
            return redirect()->route('backend.ipacs.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withFlashSuccess(trans('alerts.ipacs.answer'))
                ->withInput();
        }
    }

    /**
     * Função para buscar todas as respostas do IPAC
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\GeneralException
     */
    public function indexIpacAnswers($id){
        $ipac = $this->ipac->findOrThrowException($id);
        return view('backend.ipacs.ipac_answers', compact('ipac'));
    }

    /**
     * Função para atualizar as respostas do IPAC
     * @param $id
     * @param CreateIpacAnswerRequest $request
     * @return mixed
     */
    public function updateIpacAnswers($id, CreateIpacAnswerRequest $request){
        if($this->ipac->updateIpacAnswers($id, $request)){
            return redirect()->route('backend.ipacs.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withFlashSuccess(trans('alerts.ipacs.updated_ipac_answers'))
                ->withInput();
        }
    }
}
