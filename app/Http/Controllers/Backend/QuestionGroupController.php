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

        $title = getValueSession($request, 'title', '', $f_submit, '');

        $results = $this->groupRepository->getQuestionGroupPaginated(NULL, $title, 'title', 'asc');
        
        return view('backend.question_group.index', compact('results', 'title'));
    }

    public function create(){
        return view('backend.question_group.create');
    }

    public function edit($id = NULL){

    }

    public function destroy($id = NULL){

    }

    public function update(UpdateQuestionGroupRequest $request){

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
