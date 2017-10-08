<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions(){
        return $this->belongsToMany(\App\Model\Backend\Permission::class);
    }

    public function users(){
        return $this->belongsToMany(\App\Model\Backend\User::class);
    }
}
