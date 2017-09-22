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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evaluation(){
        return $this->belongsTo(\App\Evaluation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maximumHeartRate(){
        return $this->hasMany(\App\MaximumHeartRate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function minimumHeartRate(){
        return $this->hasMany(\App\MinimumHeartRate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reserveHeartRate(){
        return $this->hasMany(\App\ReserveHeartRate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maximumVo2(){
        return $this->hasMany(\App\MaximumVo2::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trainingVo2(){
        return $this->hasMany(\App\TrainingVo2::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maximumRepeat(){
        return $this->hasMany(\App\MaximumRepeat::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function targetZone(){
        return $this->hasMany(\App\TargetZone::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flexitest(){
        return $this->hasOne(\App\Flexitest::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wellsBank(){
        return $this->hasOne(\App\WellsBank::class);
    }
}
