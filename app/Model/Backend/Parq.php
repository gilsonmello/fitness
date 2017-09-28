<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Parq\Traits\ParqAttributes;

/**
 * Class Parq
 * @package App
 */
class Parq extends Model
{
    use SoftDeletes, ParqAttributes;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parqs';

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
}
