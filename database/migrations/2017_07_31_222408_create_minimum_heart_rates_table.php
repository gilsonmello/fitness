<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinimumHeartRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minimum_heart_rates', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('test_id')->unsigned();
            $table->integer('protocol_id')->unsigned();
            $table->tinyInteger('type_test_id');
            $table->decimal('result');
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
        Schema::dropIfExists('minimum_heart_rates');
    }
}
