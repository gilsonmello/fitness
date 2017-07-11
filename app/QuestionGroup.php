<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionGroup extends Model
{
     use SoftDeletes;

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
        //return $this->belongsToMany();
     }
}
