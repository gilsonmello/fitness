<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions(){
        return $this->belongsToMany(\App\Permission::class);
    }

    public function users(){
        return $this->belongsToMany(\App\User::class);
    }
}
