<?php

namespace App\Model\Backend;

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
        return $this->belongsTo(\App\Model\Backend\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function anthropometry(){
        return $this->hasOne(\App\Model\Backend\Anthropometry::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function test(){
        return $this->hasOne(\App\Model\Backend\Test::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bioempedancia(){
        return $this->hasOne(\App\Model\Backend\Bioempedancia::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parq(){
        return $this->hasOne(\App\Model\Backend\Parq::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pregrasCutanea(){
        return $this->hasOne(\App\Model\Backend\PregasCutanea::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function analisePosturalAnterior(){
        return $this->hasOne(\App\Model\Backend\AnalisePosturalAnterior::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function analisePosturalLateralEsquerda(){
        return $this->hasOne(\App\Model\Backend\AnalisePosturalLateralEsquerda::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function analisePosturalLateralDireita(){
        return $this->hasOne(\App\Model\Backend\AnalisePosturalLateralDireita::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function analisePosturalPosterior(){
        return $this->hasOne(\App\Model\Backend\AnalisePosturalPosterior::class);
    }

}
