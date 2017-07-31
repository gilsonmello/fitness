<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bioempedancia
 * @package App
 */
class Bioempedancia extends Model
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
    protected $table = 'bioempedancias';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->hasOne(\App\User::class);
    }
}
