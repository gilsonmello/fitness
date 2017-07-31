<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnamnesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamneses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('evaluation_id')->unsigned();
            $table->binary('pratica_atv_fisica')->nullable();
            $table->tinyInteger('aptdao_fisica')->nullable();
            $table->time('dorme')->nullable();
            $table->binary('hora_sono')->nullable();
            $table->string('atv_profissional', 50)->nullable();
            $table->time('trabalha_hrs')->nullable();
            $table->mediumText('habitos_alimentares')->nullable();
            $table->mediumText('obs')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('evaluation_id')
                ->on('evaluations')
                ->references('id');
        });

        Schema::create('anamnese_fuma', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('anamnese_id')->unsigned();
            $table->tinyInteger('fuma')->nullable();
            $table->integer('parou_ha')->nullable();
            $table->integer('fumou_por')->nullable();
            $table->integer('cigarros_por_dia')->nullable();
            $table->foreign('anamnese_id')
            ->on('anamneses')
            ->references('id');
        });

        Schema::create('anamnese_bebidas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('anamnese_id')->unsigned();
            $table->tinyInteger('bebida')->nullable();
            $table->foreign('anamnese_id')
                ->on('anamneses')
                ->references('id');
        });

        Schema::create('anamnese_lesoes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('anamnese_id')->unsigned();
            $table->binary('coluna')->nullable();
            $table->binary('costas')->nullable();
            $table->binary('cotovelo_direito')->nullable();
            $table->binary('cotovelo_esquerdo')->nullable();
            $table->binary('joelho_direito')->nullable();
            $table->binary('joelho_esquerdo')->nullable();
            $table->binary('ombro_direito')->nullable();
            $table->binary('ombro_esquerdo')->nullable();
            $table->binary('pescoco')->nullable();
            $table->binary('quadril')->nullable();
            $table->mediumText('outros')->nullable();
            $table->foreign('anamnese_id')
                ->on('anamneses')
                ->references('id');
        });

        Schema::create('anamnese_saude', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('anamnese_id')->unsigned();
            $table->binary('alter_pressao')->nullable();
            $table->binary('anemia')->nullable();
            $table->binary('ansiedade')->nullable();
            $table->binary('colesterol')->nullable();
            $table->binary('depressao')->nullable();
            $table->binary('diabetes')->nullable();
            $table->binary('gastrite')->nullable();
            $table->binary('stress')->nullable();
            $table->binary('tireoide')->nullable();
            $table->binary('tonturas')->nullable();
            $table->binary('taquicardia')->nullable();
            $table->binary('varizes')->nullable();
            $table->mediumText('outros')->nullable();
            $table->foreign('anamnese_id')
                ->on('anamneses')
                ->references('id');
        });

        Schema::create('anamnese_familiar', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('anamnese_id')->unsigned();
            $table->binary('doenca_degenerativa')->nullable();
            $table->binary('diabtes')->nullable();
            $table->binary('doenca_cardiaca')->nullable();
            $table->foreign('anamnese_id')
                ->on('anamneses')
                ->references('id');
        });

        Schema::create('anamnese_medicamentos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('anamnese_id')->unsigned();
            $table->binary('usa')->nullable();
            $table->string('tempo', 15)->nullable();
            $table->string('quais', 70)->nullable();
            $table->foreign('anamnese_id')
                ->on('anamneses')
                ->references('id');
        });

        Schema::create('anamnese_cirurgias', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('anamnese_id')->unsigned();
            $table->binary('fez')->nullable();
            $table->string('tempo', 15)->nullable();
            $table->string('quais', 70)->nullable();
            $table->foreign('anamnese_id')
                ->on('anamneses')
                ->references('id');
        });

        DB::unprepared('
            CREATE TRIGGER trigger_create_anamnese
                AFTER INSERT ON anamneses
                FOR EACH ROW
                BEGIN
                    INSERT INTO anamnese_fuma (anamnese_id) VALUES(NEW.id);
                    INSERT INTO anamnese_bebidas (anamnese_id) VALUES(NEW.id);
                    INSERT INTO anamnese_lesoes (anamnese_id) VALUES(NEW.id);
                    INSERT INTO anamnese_saude (anamnese_id) VALUES(NEW.id);
                    INSERT INTO anamnese_familiar (anamnese_id) VALUES(NEW.id);
                    INSERT INTO anamnese_medicamentos (anamnese_id) VALUES(NEW.id);
                    INSERT INTO anamnese_cirurgias (anamnese_id) VALUES(NEW.id);
                END;
        ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER trigger_create_anamnese');
        Schema::dropIfExists('anamnese_fuma');
        Schema::dropIfExists('anamnese_lesoes');
        Schema::dropIfExists('anamnese_saude');
        Schema::dropIfExists('anamnese_familiar');
        Schema::dropIfExists('anamnese_medicamentos');
        Schema::dropIfExists('anamnese_cirurgias');
        Schema::dropIfExists('anamnese_bebidas');
        Schema::dropIfExists('anamneses');
    }
}
