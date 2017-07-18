<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerUpdateIpac extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trigger_update_parq
                AFTER UPDATE ON parqs
                FOR EACH ROW
                BEGIN
                    IF IFNULL(NEW.deleted_at, 1) <> 1 THEN
                        UPDATE parq_answers 
                        SET parq_answers.deleted_at = NEW.deleted_at
                        WHERE parq_answers.parq_id = OLD.id;
                    ELSEIF IFNULL(NEW.deleted_at, 1) = 1 THEN
                        UPDATE parq_answers 
                        SET parq_answers.deleted_at = NEW.deleted_at
                        WHERE parq_answers.parq_id = OLD.id;
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
        DB::unprepared('DROP TRIGGER trigger_update_parq');
    }
}
