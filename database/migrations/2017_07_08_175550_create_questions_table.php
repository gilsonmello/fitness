<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('title', 255);
            $table->tinyInteger('answer_type')->default(0);
            $table->string('note');
            $table->tinyInteger('is_active')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('question_group_question', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');

            $table->integer('question_id')->unsigned();

            $table->integer('question_group_id')->unsigned();
            
            $table->foreign('question_id')
                    ->on('questions')
                    ->references('id');
            
            $table->foreign('question_group_id')
                    ->on('question_groups')
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
        Schema::dropIfExists('questions');
        Schema::dropIfExists('question_group_question');
    }
}
