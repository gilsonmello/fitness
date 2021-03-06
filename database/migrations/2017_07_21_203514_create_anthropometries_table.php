<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateanthropometriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anthropometries', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('evaluation_id')->unsigned();
            $table->decimal('weight')->nullable();
            $table->decimal('height')->nullable();
            $table->decimal('right_arm')->nullable();
            $table->decimal('left_arm')->nullable();
            $table->decimal('tummy')->nullable();
            $table->decimal('hip')->nullable();
            $table->decimal('coxa_proximal')->nullable();
            $table->decimal('coxa_medial')->nullable();
            $table->decimal('coxa_distal')->nullable();
            $table->decimal('right_leg')->nullable();
            $table->decimal('left_leg')->nullable();
            $table->decimal('forearm')->nullable();
            $table->decimal('chest')->nullable();
            $table->decimal('waist')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('evaluation_id')
                ->on('evaluations')
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
        Schema::dropIfExists('anthropometries');
    }
}
