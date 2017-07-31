<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnamneseMedicamento
 * @package App
 */
class AnamneseMedicamento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'anamnese_medicamentos';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function anamnese(){
        return $this->hasOne(\App\Anamnese::class);
    }
}
