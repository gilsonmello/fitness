<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTest extends Model
{

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'type_tests';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function additionalData(){
        return $this->belongsToMany(\App\AdditionalData::class, 'type_tests_has_additional_data', 'additional_data_id', 'type_test_id');
    }

    public function protocols(){
        return $this->belongsToMany(\App\Protocol::class, 'type_tests_has_protocols', 'protocol_id', 'type_test_id');
    }

}
