<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaximumVo2 extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'maximum_vo2';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function protocol(){
        return $this->belongsTo(\App\Model\Backend\Protocol::class);
    }

    public function test(){
        return $this->belongsTo(\App\Model\Backend\Test::class);
    }
}
