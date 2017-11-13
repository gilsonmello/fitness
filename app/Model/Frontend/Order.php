<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
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
    protected $table = 'orders';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function coupon(){
        return $this->belongsTo(\App\Model\Frontend\Coupon::class);
    }

    public function packages(){
        return $this->belongsToMany(\App\Model\Frontend\Package::class, 'orders_has_packages', 'order_id', 'package_id');
    }
}
