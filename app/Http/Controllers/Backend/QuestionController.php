<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Question\CreateQuestionRequest;
use App\Repositories\Backend\Question\QuestionRepository;

class QuestionController extends Controller
{
    protected $question;

    public function __construct(QuestionRepository $question)
    {
        $this->question = $question;
    }

    public function index(){
        return view('backend.questions.index');
    }

    public function create(){
        return view('backend.questions.create');
    }

    public function store(CreateQuestionRequest $request){
        $this->question->create($request);
    }
}
