<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaximumRepeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maximum_repeat', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('test_id')->unsigned();
            $table->integer('protocol_id')->unsigned();
            $table->tinyInteger('type_resistance');
            $table->integer('type_test_id')->unsigned();
            $table->decimal('load_estimed')->nullable();
            $table->decimal('option_1')->nullable();
            $table->decimal('option_2')->nullable();
            $table->decimal('option_3')->nullable();
            $table->decimal('option_4')->nullable();
            $table->decimal('maximum_repeat')->nullable();
            $table->longText('obs')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('test_id')
                ->on('tests')
                ->references('id');
            $table->foreign('protocol_id')
                ->on('protocols')
                ->references('id');
            $table->foreign('type_test_id')
                ->on('type_tests')
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
        Schema::dropIfExists('maximum_repeat');
    }
}
