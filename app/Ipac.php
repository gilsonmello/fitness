<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Ipac\Traits\IpacAttributes;

class Ipac extends Model
{
    use SoftDeletes, IpacAttributes;

    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ipacs';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function questionGroup(){
        return $this->belongsTo(\App\QuestionGroup::class);
    }

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function ipacAnswers(){
        return $this->hasMany(\App\IpacAnswer::class);
    }
}
