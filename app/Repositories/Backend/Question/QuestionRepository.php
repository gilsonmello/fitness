<?php
namespace App\Repositories\Backend\Question;

use App\Question;
use App\Exceptions\GeneralException;

/**
 * Class QuestionRepository
 * @package App\Repositories\Backend\Question
 */
class QuestionRepository{
    protected $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    public function find($id = NULL){

    }

    public function create($request){

    }
}