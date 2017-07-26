<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluationAttribute extends Model
{
    use SoftDeletes;

    public $timestamps = true;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'evaluation_attributes';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function user(){
        return $this->hasOne(\App\User::class);
    }

    public function evaluation(){
        return $this->hasOne(\App\Evaluation::class);
    }
}