<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\QuestionGroup\CreateQuestionGroupRequest;
use App\Http\Requests\Backend\QuestionGroup\UpdateQuestionGroupRequest;
use App\Repositories\Backend\QuestionGroup\QuestionGroupRepository;


class QuestionGroupController extends Controller
{
    protected $groupRepository;

    public function __construct(QuestionGroupRepository $groupRepository){
        $this->groupRepository = $groupRepository;
    }

    public function index(Request $request){

        $request->session()->put('lastpage', $request->only('page')['page']);

        $f_submit = $request->input('f_submit', '');

        $title = getValueSession($request, 'QuestionGroupController@index:title', '', $f_submit, '');

        $results = $this->groupRepository->getQuestionGroupPaginated(NULL, $title, 'title', 'asc');

        return view('backend.question_group.index', compact('results', 'title'));
    }

    public function create(){
        return view('backend.question_group.create');
    }

    public function edit($id = NULL){
        if(!is_null($id)) {
            $groupQuestion = $this->groupRepository->findOrThrowException($id);
            return view('backend.question_group.edit', compact('groupQuestion'));
        }
        throw new GeneralException('Operação Invalidada');
    }

    public function destroy($id = NULL){
        if($this->groupRepository->destroy($id)){
            return redirect()
                ->route('backend.question_group.index')
                ->withFlashSuccess(trans("alerts.question_group.deleted"));
        }
        throw new GeneralException('Operação Invalidada');
    }

    public function update($id, UpdateQuestionGroupRequest $request){
        if($this->groupRepository->update($id, $request)){
            return redirect()
                ->route('backend.question_group.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withFlashSuccess(trans("alerts.question_group.updated"));
        }
    }

    public function store(CreateQuestionGroupRequest $request){
        $result = $this->groupRepository->create($request->all());
        if($result){
            return redirect()
                ->route('backend.question_group.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withInput()
                ->withFlashSuccess(trans("alerts.question_group.created"));
        }
    }
}
