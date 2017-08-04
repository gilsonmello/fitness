<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Backend\Test\Traits\TestAttributes;

class Test extends Model
{
    use SoftDeletes, TestAttributes;

    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tests';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function maximumHeartRate(){
        return $this->hasMany(\App\MaximumHeartRate::class);
    }

    public function minimumHeartRate(){
        return $this->hasMany(\App\MinimumHeartRate::class);
    }
}
