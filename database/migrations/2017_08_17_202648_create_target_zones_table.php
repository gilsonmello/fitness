<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_zones', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('test_id')->unsigned();
            $table->integer('protocol_id')->unsigned();
            $table->decimal('result')->nullable();
            $table->tinyInteger('type_test_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('test_id')
                ->on('tests')
                ->references('id');
            $table->foreign('protocol_id')
                ->on('protocols')
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
        Schema::dropIfExists('target_zones');
    }
}
