<?php

namespace App\Model\Frontend;

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

    public function order(){
    	return $this->belongsTo(\App\User::class);
    }

    public function order(){
    	return $this->belongsTo(\App\Model\Frontend\Order::class);
    }

    public function package(){
    	return $this->belongsTo(\App\Model\Frontend\Package::class);
    }
	
	public function diary(){
    	return $this->belongsTo(\App\Model\Frontend\Diary::class);
    }

    public function diaryHour(){
    	return $this->belongsTo(\App\Model\Frontend\DiaryHour::class);
    }
}
