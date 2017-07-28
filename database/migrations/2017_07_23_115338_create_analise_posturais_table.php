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
            $table->binary('arlcd')->nullable();
            $table->binary('arlce')->nullable();
            $table->binary('ailcd')->nullable();
            $table->binary('ailce')->nullable();
            $table->binary('aeod')->nullable();
            $table->binary('aeoe')->nullable();
            $table->binary('armpd')->nullable();
            $table->binary('armpe')->nullable();
            $table->binary('admp')->nullable();
            $table->binary('adq')->nullable();
            $table->binary('aami')->nullable();
            $table->binary('ajvaro')->nullable();
            $table->binary('ajvalgo')->nullable();
            $table->binary('arijde')->nullable();
            $table->binary('apede')->nullable();
            $table->binary('apide')->nullable();
            $table->binary('apadutode')->nullable();
            $table->binary('apabdutode')->nullable();
            $table->binary('admi')->nullable();
            $table->binary('ape')->nullable();
            $table->binary('aas')->nullable();
            $table->longText('img')->nullable();
            $table->longText('tmp_img')->nullable();
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
            $table->binary('lehc')->nullable();
            $table->binary('leht')->nullable();
            $table->binary('lehl')->nullable();
            $table->binary('lecp')->nullable();
            $table->binary('legr')->nullable();
            $table->binary('legf')->nullable();
            $table->binary('leact')->nullable();
            $table->binary('lell')->nullable();
            $table->binary('leas')->nullable();
            $table->longText('img')->nullable();
            $table->longText('tmp_img')->nullable();
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
            $table->binary('ldhc')->nullable();
            $table->binary('ldht')->nullable();
            $table->binary('ldhl')->nullable();
            $table->binary('ldcp')->nullable();
            $table->binary('ldgr')->nullable();
            $table->binary('ldgf')->nullable();
            $table->binary('ldact')->nullable();
            $table->binary('ldll')->nullable();
            $table->binary('ldas')->nullable();
            $table->longText('img')->nullable();
            $table->longText('tmp_img')->nullable();
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
            $table->binary('pec')->nullable();
            $table->binary('pet')->nullable();
            $table->binary('pel')->nullable();
            $table->binary('pde')->nullable();
            $table->binary('peabduzidas')->nullable();
            $table->binary('peaduzidas')->nullable();
            $table->binary('pdda')->nullable();
            $table->binary('pdq')->nullable();
            $table->binary('pdpd')->nullable();
            $table->binary('prmp')->nullable();
            $table->binary('pas')->nullable();
            $table->longText('img')->nullable();
            $table->longText('tmp_img')->nullable();
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
