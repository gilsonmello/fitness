<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * For soft deletes
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
