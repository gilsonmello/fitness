<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MinimumHeartRate extends Model
{
    use SoftDeletes;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'minimum_heart_rates';

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
