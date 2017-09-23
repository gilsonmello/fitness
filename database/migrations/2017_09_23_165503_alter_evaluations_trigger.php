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
        DB::unprepared('DROP TRIGGER trigger_create_evaluations');
        DB::unprepared('
            CREATE TRIGGER trigger_create_evaluations
                AFTER INSERT ON evaluations
                FOR EACH ROW
                BEGIN
                    INSERT INTO parqs (
                        question_1,
                        question_2,
                        question_3,
                        question_4,
                        question_5,
                        question_6,
                        question_7,
                        question_8,
                        evaluation_id,
                        created_at,
                        updated_at
                    )

                    VALUES(
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        NEW.id,
                        NOW(),
                        NOW()
                    );
                    INSERT INTO anthropometries (evaluation_id, created_at, updated_at) VALUES(
                        NEW.id,
                        NOW(),
                        NOW()
                    );
                    INSERT INTO pregas_cutaneas (evaluation_id, created_at, updated_at) VALUES(
                        NEW.id,
                        NOW(),
                        NOW()
                    );
                    INSERT INTO bioempedancias (evaluation_id, created_at, updated_at) VALUES(
                        NEW.id,
                        NOW(),
                        NOW()
                    );
                    INSERT INTO analise_posturais_anterior (evaluation_id, created_at, updated_at) VALUES(
                        NEW.id,
                        NOW(),
                        NOW()
                    );
                    INSERT INTO analise_posturais_lateral_direita (evaluation_id, created_at, updated_at) VALUES(
                        NEW.id,
                        NOW(),
                        NOW()
                    );
                    INSERT INTO analise_posturais_lateral_esquerda (evaluation_id, created_at, updated_at) VALUES(
                        NEW.id,
                        NOW(),
                        NOW()
                    );
                    INSERT INTO analise_posturais_posterior (evaluation_id, created_at, updated_at) VALUES(
                        NEW.id,
                        NOW(),
                        NOW()
                    );
                    INSERT INTO riscos_coronarios (evaluation_id, created_at, updated_at) VALUES(
                        NEW.id,
                        NOW(),
                        NOW()
                    );
                    INSERT INTO anamneses (evaluation_id, created_at, updated_at) VALUES(
                        NEW.id,
                        NOW(),
                        NOW()
                    );
                    INSERT INTO tests (evaluation_id, validity, created_at, updated_at) VALUES(
                        NEW.id,
                        NEW.validity,
                        NOW(),
                        NOW()
                    );
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
        DB::unprepared('DROP TRIGGER trigger_create_evaluations');
    }
}
