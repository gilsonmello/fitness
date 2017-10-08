<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class TypeTest extends Model
{

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'type_tests';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    
}
