<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnalisePosturalLateralDireita extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'analise_posturais_lateral_direita';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function evaluation(){
        return $this->hasOne(\App\Model\Backend\Evaluation::class);
    }
}
