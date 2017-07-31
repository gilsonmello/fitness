<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Backend\Evaluation\Traits\EvaluationAttributes;

/**
 * Class Evaluation
 * @package App
 */
class Evaluation extends Model
{
    use SoftDeletes, EvaluationAttributes;

    /**
     * @var bool
     */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function evaluationAttribute(){
        return $this->hasOne(\App\EvaluationAttribute::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bioempedancia(){
        return $this->hasOne(\App\Bioempedancia::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function antropometria(){
        return $this->hasOne(\App\Antropometria::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parq(){
        return $this->hasOne(\App\Parq::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pregrasCutanea(){
        return $this->hasOne(\App\PregasCutanea::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function analisePosturalAnterior(){
        return $this->hasOne(\App\AnalisePosturalAnterior::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function analisePosturalLateralEsquerda(){
        return $this->hasOne(\App\AnalisePosturalLateralEsquerda::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function analisePosturalLateralDireita(){
        return $this->hasOne(\App\AnalisePosturalLateralDireita::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function analisePosturalPosterior(){
        return $this->hasOne(\App\AnalisePosturalPosterior::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function riscoCoronario(){
        return $this->hasOne(\App\RiscoCoronario::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function anamnese(){
        return $this->hasOne(\App\Anamnese::class);
    }

}
