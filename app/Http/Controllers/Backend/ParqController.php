<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Parq\CreateParqRequest;
use App\Http\Requests\Backend\Parq\UpdateParqRequest;
use App\Http\Requests\Backend\Parq\CreateParqAnswerRequest;
use App\Repositories\Backend\Parq\ParqRepository;
use App\Repositories\Backend\QuestionGroup\QuestionGroupRepository;
use App\Repositories\Backend\User\UserRepository;
use App\ParqAnswer;
use App\User;
use Auth;

class ParqController extends Controller{

    /**
     * @var IpacRepository
     */
    protected $parq;

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
    public function __construct(UserRepository $user, ParqRepository $parq, QuestionGroupRepository $questionGroup){
        $this->user = $user;
        $this->parq = $parq;
        $this->questionGroup = $questionGroup;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Auth $user){
        $request->session()->put('lastpage', $request->only('page')['page']);

        $f_submit = $request->input('f_submit', '');

        //$title = getValueSession($request, 'IpacController@index:title', '', $f_submit, '');
        $parqs = $this->parq->getParqPaginated(NULL);
        return view('backend.parqs.index', compact('title', 'parqs'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $questionGroup = $this->questionGroup->all();
        $users = $this->user->all();
        return view('backend.parqs.create', compact('questionGroup', 'users'));
    }

    /**
     * @param CreateIpacRequest $request
     * @return mixed
     */
    public function store(CreateParqRequest $request){
        if($this->parq->create($request)){
            return redirect()
                ->route('backend.parqs.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withInput()
                ->withFlashSuccess(trans('alerts.parqs.created'));
        }
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy($id){
        if($this->parq->destroy($id)){
            return redirect()
                ->route('backend.parqs.index')
                ->withFlashSuccess(trans("alerts.parqs.deleted"));
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
        $parq = $this->parq->findOrThrowException($id);
        return view('backend.parqs.edit', compact('parq', 'groupQuestions', 'users'));
    }

    /**
     * @param $id
     * @param UpdateIpacRequest $request
     * @return mixed
     */
    public function update($id, UpdateParqRequest $request){
        if($this->parq->update($id, $request)){
            return redirect()->route('backend.parqs.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withFlashSuccess(trans('alerts.parqs.updated'))
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
        $ipac = $this->parq->findOrThrowException($id);
        $groupQuestions = $this->questionGroup->all();
        $users = $this->user->all();
        return view('backend.parqs.answer', compact('ipac', 'groupQuestions', 'users'));
    }

    /**
     * Função para cadastrar as respostas do IPAC
     * @param $id
     * @param CreateIpacAnswerRequest $request
     * @return mixed
     */
    public function createIpacAnswers($id, CreateParqAnswerRequest $request){
        if($this->parq->createParqAnswers($id, $request)){
            return redirect()->route('backend.parqs.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withFlashSuccess(trans('alerts.parqs.answer'))
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
        $parq = $this->parq->findOrThrowException($id);
        return view('backend.parqs.index_parq_answers', compact('parq'));
    }

    /**
     * Função para atualizar as respostas do IPAC
     * @param $id
     * @param CreateIpacAnswerRequest $request
     * @return mixed
     */
    public function updateIpacAnswers($id, CreateParqAnswerRequest $request){
        if($this->parq->updateIpacAnswers($id, $request)){
            return redirect()->route('backend.parqs.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withFlashSuccess(trans('alerts.parqs.updated_ipac_answers'))
                ->withInput();
        }
    }

}
