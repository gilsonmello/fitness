<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\QuestionGroup\Traits\QuestionGroupAttributes;

class QuestionGroup extends Model
{
     use SoftDeletes, QuestionGroupAttributes;

     public $timestamps = true;

     /**
      * The database table used by the model.
      *
      * @var string
      */
     protected $table = 'question_groups';

     /**
      * The attributes that are not mass assignable.
      *
      * @var array
      */
     protected $guarded = ['id'];

     public function questions(){
        return $this->belongsToMany(\App\Question::class, 'question_group_question', 'question_id', 'question_group_id');
     }
    /*
     public function scopeSuppliers($query){
         return $query->orderBy('company_name', 'asc')
         ->get();
     }*/
}
