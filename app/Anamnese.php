<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Anamnese
 * @package App
 */
class Anamnese extends Model
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
    protected $table = 'anamneses';

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fuma(){
        return $this->hasOne(\App\AnamneseFuma::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bebida(){
        return $this->hasOne(\App\AnamneseBebida::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lesao(){
        return $this->hasOne(\App\AnamneseLesao::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function saude(){
        return $this->hasOne(\App\AnamneseSaude::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function familiar(){
        return $this->hasOne(\App\AnamneseFamiliar::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medicamento(){
        return $this->hasOne(\App\AnamneseMedicamento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cirurgia(){
        return $this->hasOne(\App\AnamneseCirurgia::class);
    }
}
