<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnamneseFuma
 * @package App
 */
class AnamneseFuma extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'anamnese_fuma';

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
