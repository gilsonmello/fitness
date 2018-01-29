<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Backend\Protocol\Traits\PermissionAttributes;

class Protocol extends Model
{
    use SoftDeletes, PermissionAttributes;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'protocols';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function maximumHeartRate(){
        return $this->hasOne(\App\Model\Backend\MaximumHeartRate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function minimumHeartRate(){
        return $this->hasOne(\App\Model\Backend\MinimumHeartRate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function measure(){
        return $this->belongsTo(\App\Model\Backend\Measure::class);
    }

}
