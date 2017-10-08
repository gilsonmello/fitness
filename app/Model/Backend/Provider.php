<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
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
    protected $table = 'providers';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
