<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
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
    protected $table = 'packages';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function categories(){
        return $this->belongsToMany(\App\Model\Frontend\Category::class, 'categories_has_packages', 'package_id', 'categorie_id');
    }
}
