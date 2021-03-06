<?php

namespace App\Model\API;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
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
    protected $table = 'schedules';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function user(){
    	return $this->belongsTo(\App\User::class);
    }
	
	public function order(){
    	return $this->belongsTo(\App\Model\API\Order::class);
    }

    public function diary(){
    	return $this->belongsTo(\App\Model\API\Diary::class);
    }

    public function diaryHour(){
    	return $this->belongsTo(\App\Model\API\DiaryHour::class);
    }

    public function package(){
    	return $this->belongsTo(\App\Model\API\Package::class);
    }

    public function supplier(){
    	return $this->belongsTo(\App\Model\API\Supplier::class);
    }
}
