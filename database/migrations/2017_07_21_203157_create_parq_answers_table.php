<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParqAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parq_answers', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('parq_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('question_group_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->tinyInteger('answer');
            $table->longText('option_answer')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('parq_id')
                ->on('parqs')
                ->references('id');
            $table->foreign('user_id')
                ->on('users')
                ->references('id');
            $table->foreign('question_group_id')
                ->on('question_groups')
                ->references('id');
            $table->foreign('question_id')
                ->on('questions')
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
        Schema::dropIfExists('parq_answers');
    }
}
