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
            $table->boolean('arlcd')->nullable();
            $table->boolean('arlce')->nullable();
            $table->boolean('ailcd')->nullable();
            $table->boolean('ailce')->nullable();
            $table->boolean('aeod')->nullable();
            $table->boolean('aeoe')->nullable();
            $table->boolean('armpd')->nullable();
            $table->boolean('armpe')->nullable();
            $table->boolean('admp')->nullable();
            $table->boolean('adq')->nullable();
            $table->boolean('aami')->nullable();
            $table->boolean('ajvaro')->nullable();
            $table->boolean('ajvalgo')->nullable();
            $table->boolean('arijde')->nullable();
            $table->boolean('apede')->nullable();
            $table->boolean('apide')->nullable();
            $table->boolean('apadutode')->nullable();
            $table->boolean('apabdutode')->nullable();
            $table->boolean('admi')->nullable();
            $table->boolean('ape')->nullable();
            $table->boolean('aas')->nullable();
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
            $table->boolean('lehc')->nullable();
            $table->boolean('leht')->nullable();
            $table->boolean('lehl')->nullable();
            $table->boolean('lecp')->nullable();
            $table->boolean('legr')->nullable();
            $table->boolean('legf')->nullable();
            $table->boolean('leact')->nullable();
            $table->boolean('lell')->nullable();
            $table->boolean('leas')->nullable();
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
            $table->boolean('ldhc')->nullable();
            $table->boolean('ldht')->nullable();
            $table->boolean('ldhl')->nullable();
            $table->boolean('ldcp')->nullable();
            $table->boolean('ldgr')->nullable();
            $table->boolean('ldgf')->nullable();
            $table->boolean('ldact')->nullable();
            $table->boolean('ldll')->nullable();
            $table->boolean('ldas')->nullable();
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
            $table->boolean('pec')->nullable();
            $table->boolean('pet')->nullable();
            $table->boolean('pel')->nullable();
            $table->boolean('pde')->nullable();
            $table->boolean('peabduzidas')->nullable();
            $table->boolean('peaduzidas')->nullable();
            $table->boolean('pdda')->nullable();
            $table->boolean('pdq')->nullable();
            $table->boolean('pdpd')->nullable();
            $table->boolean('prmp')->nullable();
            $table->boolean('pas')->nullable();
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
