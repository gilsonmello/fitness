<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('user_evaluation', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('evaluation_id')->unsigned();
            $table->foreign('user_id')
                ->on('users')
                ->references('id');
            $table->foreign('evaluation_id')
                ->on('evaluations')
                ->references('id');
        });

        Schema::create('tests_evaluation', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('test_id')->unsigned();
            $table->integer('evaluation_id')->unsigned();
            $table->foreign('test_id')
                ->on('tests')
                ->references('id');
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
        Schema::dropIfExists('evaluations');
        Schema::dropIfExists('user_evaluation');
        Schema::dropIfExists('tests_evaluation');
    }
}
