<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flexitest extends Model
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
    protected $table = 'flexitests';

    protected $fillable = [
        'test_id',
        'abduction_shoulders',
        'lateral_trunk_flexion',
        'leg_hyperextension',
        'elbow_flexion',
        'elbow_hyperextension',
        'fist_flexion',
        'fist_extension',
        'horizontal_shoulder_abduction',
        'hip_flexion',
        'trunk_hyperextension',
        'haunch_flexion',
        'haunch_extension',
        'leg_flexion',
        'plantar_dorsiflexion',
        'plantar_flexion'
    ];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function test(){
        return $this->hasOne(\App\Test::class);
    }
}
