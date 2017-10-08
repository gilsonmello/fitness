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

            $table->integer('evaluation_id')->unsigned();

            $table->boolean('question_1');
            $table->longText('option_answer_1')->nullable();

            $table->boolean('question_2');
            $table->longText('option_answer_2')->nullable();

            $table->boolean('question_3');
            $table->longText('option_answer_3')->nullable();

            $table->boolean('question_4');
            $table->longText('option_answer_4')->nullable();

            $table->boolean('question_5');
            $table->longText('option_answer_5')->nullable();

            $table->boolean('question_6');
            $table->longText('option_answer_6')->nullable();

            $table->boolean('question_7');
            $table->longText('option_answer_7')->nullable();

            $table->boolean('question_8');
            $table->longText('option_answer_8')->nullable();

            $table->boolean('terms')->default(1);

            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('parqs');
    }
}
