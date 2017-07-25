<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalisePosturaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analise_posturais_anterior', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('evaluation_id')->unsigned();
            $table->tinyInteger('arlcd')->nullable();
            $table->tinyInteger('arlce')->nullable();
            $table->tinyInteger('ailcd')->nullable();
            $table->tinyInteger('ailce')->nullable();
            $table->tinyInteger('aeod')->nullable();
            $table->tinyInteger('aeoe')->nullable();
            $table->tinyInteger('armpd')->nullable();
            $table->tinyInteger('armpe')->nullable();
            $table->tinyInteger('admp')->nullable();
            $table->tinyInteger('adq')->nullable();
            $table->tinyInteger('aami')->nullable();
            $table->tinyInteger('ajvaro')->nullable();
            $table->tinyInteger('ajvalgo')->nullable();
            $table->tinyInteger('arijde')->nullable();
            $table->tinyInteger('apede')->nullable();
            $table->tinyInteger('apide')->nullable();
            $table->tinyInteger('apadutode')->nullable();
            $table->tinyInteger('apabdutode')->nullable();
            $table->tinyInteger('admi')->nullable();
            $table->tinyInteger('ape')->nullable();
            $table->tinyInteger('aas')->nullable();
            $table->text('img')->nullable();
            $table->longText('obs')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('evaluation_id')
                ->on('evaluations')
                ->references('id');
        });

        Schema::create('analise_posturais_lateral_esquerda', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('evaluation_id')->unsigned();
            $table->tinyInteger('lehc')->nullable();
            $table->tinyInteger('leht')->nullable();
            $table->tinyInteger('lehl')->nullable();
            $table->tinyInteger('lecp')->nullable();
            $table->tinyInteger('legr')->nullable();
            $table->tinyInteger('legf')->nullable();
            $table->tinyInteger('leact')->nullable();
            $table->tinyInteger('lell')->nullable();
            $table->tinyInteger('leas')->nullable();
            $table->text('img')->nullable();
            $table->longText('obs')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('evaluation_id')
                ->on('evaluations')
                ->references('id');
        });

        Schema::create('analise_posturais_lateral_direita', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('evaluation_id')->unsigned();
            $table->tinyInteger('ldhc')->nullable();
            $table->tinyInteger('ldht')->nullable();
            $table->tinyInteger('ldhl')->nullable();
            $table->tinyInteger('ldcp')->nullable();
            $table->tinyInteger('ldgr')->nullable();
            $table->tinyInteger('ldgf')->nullable();
            $table->tinyInteger('ldact')->nullable();
            $table->tinyInteger('ldll')->nullable();
            $table->tinyInteger('ldas')->nullable();
            $table->text('img')->nullable();
            $table->longText('obs')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('evaluation_id')
                ->on('evaluations')
                ->references('id');
        });

        Schema::create('analise_posturais_posterior', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('evaluation_id')->unsigned();
            $table->tinyInteger('pec')->nullable();
            $table->tinyInteger('pet')->nullable();
            $table->tinyInteger('pel')->nullable();
            $table->tinyInteger('pde')->nullable();
            $table->tinyInteger('peabduzidas')->nullable();
            $table->tinyInteger('peaduzidas')->nullable();
            $table->tinyInteger('pdda')->nullable();
            $table->tinyInteger('pdq')->nullable();
            $table->tinyInteger('pdqd')->nullable();
            $table->tinyInteger('prmp')->nullable();
            $table->tinyInteger('pas')->nullable();
            $table->text('img')->nullable();
            $table->longText('obs')->nullable();
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
        Schema::dropIfExists('analise_posturais_posterior');
        Schema::dropIfExists('analise_posturais_lateral_esquerda');
        Schema::dropIfExists('analise_posturais_lateral_direita');
        Schema::dropIfExists('analise_posturais_anterior');
    }
}
