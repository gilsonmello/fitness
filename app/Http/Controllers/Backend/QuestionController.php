<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Question\CreateQuestionRequest;
use App\Http\Requests\Backend\Question\UpdateQuestionRequest;
use App\Repositories\Backend\Question\QuestionRepository;
use App\Repositories\Backend\QuestionGroup\QuestionGroupRepository;

class QuestionController extends Controller
{
    protected $question;

    public function __construct(QuestionRepository $question, QuestionGroupRepository $groupRepository){
        $this->question = $question;
        $this->groupRepository = $groupRepository;
    }

    public function index(Request $request){

        $request->session()->put('lastpage', $request->only('page')['page']);

        $f_submit = $request->input('f_submit', '');

        $title = getValueSession($request, 'QuestionController@index:title', '', $f_submit, '');

        $questions = $this->question->getQuestionPaginated(NULL, $title);

        return view('backend.questions.index', compact('questions', 'title'));
    }

    public function create(){
        $groupQuestionsRepository = $this->groupRepository->all();
        return view('backend.questions.create', compact('groupQuestionsRepository'));
    }

    public function store(CreateQuestionRequest $request){
        if($this->question->create($request)){
            return redirect()
                ->route('backend.questions.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withFlashSuccess('alerts.questions.created');
        }
    }

    public function destroy($id){
        if($this->question->destroy($id)){
            return redirect()
                ->route('backend.questions.index')
                ->withFlashSuccess(trans("alerts.questions.deleted"));
        }
        throw new GeneralException('Operação Invalidada');
    }

    public function edit($id){
        $groupQuestions = $this->groupRepository->all();
        $question = $this->question->findOrThrowException($id);
        return view('backend.questions.edit', compact('question', 'groupQuestions'));
    }

    public function update($id, UpdateQuestionRequest $request){
        if($this->question->update($id, $request)){
            return redirect()->route('backend.questions.index', ['page' => $request->session()->get('lastpage', '1')])
                ->withFlashSuccess('alerts.questions.created')
                ->withInput();
        }
    }
}
