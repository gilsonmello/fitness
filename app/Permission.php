<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = true;
    
    protected $table = 'permissions';
    
    public function roles(){
        return $this->belongsToMany(\App\Role::class);
    }

    public function rolesOfUser(){
        return $this->belongsToMany(\App\Role::class);
    }
}
