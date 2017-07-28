<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Backend\Evaluation\Traits\EvaluationAttributes;

class Evaluation extends Model
{
    use SoftDeletes, EvaluationAttributes;

    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'evaluations';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function evaluationAttribute(){
        return $this->hasOne(\App\EvaluationAttribute::class);
    }

    public function bioempedancia(){
        return $this->hasOne(\App\Bioempedancia::class);
    }

    public function antropometria(){
        return $this->hasOne(\App\Antropometria::class);
    }

    public function parq(){
        return $this->hasOne(\App\Parq::class);
    }

    public function pregrasCutanea(){
        return $this->hasOne(\App\PregasCutanea::class);
    }

    public function analisePosturalAnterior(){
        return $this->hasOne(\App\AnalisePosturalAnterior::class);
    }

    public function analisePosturalLateralEsquerda(){
        return $this->hasOne(\App\AnalisePosturalLateralEsquerda::class);
    }

    public function analisePosturalLateralDireita(){
        return $this->hasOne(\App\AnalisePosturalLateralDireita::class);
    }

    public function analisePosturalPosterior(){
        return $this->hasOne(\App\AnalisePosturalPosterior::class);
    }

}
