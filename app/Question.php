<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Question\Traits\QuestionAttributes;

class Question extends Model
{
    use SoftDeletes, QuestionAttributes;

    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function questionGroup(){
        return $this->belongsToMany(\App\QuestionGroup::class, 'question_group_question', 'question_id', 'question_group_id');
    }
}
