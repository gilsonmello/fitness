<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Antropometria
 * @package App
 */
class Antropometria extends Model
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
    protected $table = 'antropometrias';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function evaluation(){
        return $this->hasOne(\App\Evaluation::class);
    }

}
