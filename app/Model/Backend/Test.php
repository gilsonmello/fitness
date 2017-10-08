<?php

namespace App\Model\Backend;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evaluation(){
        return $this->belongsTo(\App\Model\Backend\Evaluation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(\App\Model\Backend\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maximumHeartRate(){
        return $this->hasMany(\App\Model\Backend\MaximumHeartRate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function minimumHeartRate(){
        return $this->hasMany(\App\Model\Backend\MinimumHeartRate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reserveHeartRate(){
        return $this->hasMany(\App\Model\Backend\ReserveHeartRate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maximumVo2(){
        return $this->hasMany(\App\Model\Backend\MaximumVo2::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trainingVo2(){
        return $this->hasMany(\App\Model\Backend\TrainingVo2::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maximumRepeat(){
        return $this->hasMany(\App\Model\Backend\MaximumRepeat::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function targetZone(){
        return $this->hasMany(\App\Model\Backend\TargetZone::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flexitest(){
        return $this->hasOne(\App\Model\Backend\Flexitest::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wellsBank(){
        return $this->hasOne(\App\Model\Backend\WellsBank::class);
    }
}
