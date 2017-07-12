<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    
    public function roles(){
        return $this->belongsToMany(\App\Role::class);
    }

    public function rolesOfUser(){
        return $this->belongsToMany(\App\Role::class);
    }
}
