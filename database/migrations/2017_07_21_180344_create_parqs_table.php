<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parqs', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('question_group_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->integer('evaluation_id')->unsigned();

            $table->tinyInteger('is_active')->default(1);

            $table->tinyInteger('question_1')->default(0);
            $table->longText('option_answer_1')->nullable();

            $table->tinyInteger('question_2')->default(0);
            $table->longText('option_answer_2')->nullable();

            $table->tinyInteger('question_3')->default(0);
            $table->longText('option_answer_3')->nullable();

            $table->tinyInteger('question_4')->default(0);
            $table->longText('option_answer_4')->nullable();

            $table->tinyInteger('question_5')->default(0);
            $table->longText('option_answer_5')->nullable();

            $table->tinyInteger('question_6')->default(0);
            $table->longText('option_answer_6')->nullable();

            $table->tinyInteger('question_7')->default(0);
            $table->longText('option_answer_7')->nullable();

            $table->tinyInteger('question_8')->default(0);
            $table->longText('option_answer_8')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('question_group_id')
                ->on('question_groups')
                ->references('id');
            $table->foreign('user_id')
                ->on('users')
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
        Schema::dropIfExists('parqs');
    }
}
