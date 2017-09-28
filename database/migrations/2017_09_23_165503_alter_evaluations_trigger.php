<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEvaluationsTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trigger_delete_evaluations
                AFTER UPDATE ON evaluations
                FOR EACH ROW
                BEGIN
                    IF (NEW.deleted_at IS NOT NULL) OR (NEW.deleted_at IS NULL) THEN
                        UPDATE parqs
                        SET deleted_at = NEW.deleted_at
                        WHERE parqs.evaluation_id = NEW.id;

                        UPDATE pregas_cutaneas
                        SET deleted_at = NEW.deleted_at
                        WHERE pregas_cutaneas.evaluation_id = NEW.id;

                        UPDATE bioempedancias
                        SET deleted_at = NEW.deleted_at
                        WHERE bioempedancias.evaluation_id = NEW.id;

                        UPDATE analise_posturais_anterior
                        SET deleted_at = NEW.deleted_at
                        WHERE analise_posturais_anterior.evaluation_id = NEW.id;

                        UPDATE analise_posturais_lateral_direita
                        SET deleted_at = NEW.deleted_at
                        WHERE analise_posturais_lateral_direita.evaluation_id = NEW.id;

                        UPDATE analise_posturais_lateral_esquerda
                        SET deleted_at = NEW.deleted_at
                        WHERE analise_posturais_lateral_esquerda.evaluation_id = NEW.id;

                        UPDATE analise_posturais_posterior
                        SET deleted_at = NEW.deleted_at
                        WHERE analise_posturais_posterior.evaluation_id = NEW.id;

                        UPDATE tests
                        SET deleted_at = NEW.deleted_at, validity = NEW.validity
                        WHERE tests.evaluation_id = NEW.id;

                        UPDATE anthropometries
                        SET deleted_at = NEW.deleted_at
                        WHERE anthropometries.evaluation_id = NEW.id;

                        UPDATE additional_data SET deleted_at = NEW.deleted_at WHERE evaluation_id = NEW.id;

                    END IF;

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
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_delete_evaluations');
    }
}
