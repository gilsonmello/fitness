<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiscosCoronariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riscos_coronarios', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('evaluation_id')->unsigned();
            $table->tinyInteger('sexo_idade')->nullable();
            $table->tinyInteger('fumo')->nullable();
            $table->tinyInteger('peso')->nullable();
            $table->tinyInteger('atividade_fisica')->nullable();
            $table->tinyInteger('historico_familiar')->nullable();
            $table->tinyInteger('pressao_arterial_sistolica')->nullable();
            $table->tinyInteger('glicemia')->nullable();
            $table->tinyInteger('colesterol')->nullable();
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
        Schema::dropIfExists('riscos_coronarios');
    }
}
