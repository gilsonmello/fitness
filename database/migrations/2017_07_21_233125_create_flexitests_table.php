<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlexitestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flexitests', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('test_id')->unsigned();
            $table->tinyInteger('abduction_shoulders')->nullable();
            $table->tinyInteger('lateral_trunk_flexion')->nullable();
            $table->tinyInteger('leg_hyperextension')->nullable();
            $table->tinyInteger('elbow_flexion')->nullable();
            $table->tinyInteger('elbow_hyperextension')->nullable();
            $table->tinyInteger('fist_flexion')->nullable();
            $table->tinyInteger('fist_extension')->nullable();
            $table->tinyInteger('horizontal_shoulder_abduction')->nullable();
            $table->tinyInteger('hip_flexion')->nullable();
            $table->tinyInteger('trunk_hyperextension')->nullable();
            $table->tinyInteger('haunch_flexion')->nullable();
            $table->tinyInteger('haunch_extension')->nullable();
            $table->tinyInteger('leg_flexion')->nullable();
            $table->tinyInteger('plantar_dorsiflexion')->nullable();
            $table->tinyInteger('plantar_flexion')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('test_id')
                ->on('tests')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flexitests');
    }
}
