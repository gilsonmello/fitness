<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Backend\AdditionalData\Traits\AdditionalDataAttributes;

/**
 * Class AdditionalData
 * @package App
 */
class AdditionalData extends Model
{
    use SoftDeletes, AdditionalDataAttributes;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'additional_data';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function evaluation(){
        return $this->belongsTo(\App\Model\Backend\Evaluation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function measure(){
        return $this->belongsTo(\App\Model\Backend\Measure::class);
    }
}
