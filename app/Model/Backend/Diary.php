<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Backend\Diary\Traits\DiaryAttributes;

class Diary extends Model
{
    use SoftDeletes, DiaryAttributes;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'diaries';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hours(){
        return $this->hasMany(\App\Model\Backend\DiaryHour::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier(){
        return $this->belongsTo(\App\Model\Backend\Supplier::class);
    }

    public function getAvailableDateAttribute($available_date){
        return format($available_date, 'd/m/Y');  
    }

}
