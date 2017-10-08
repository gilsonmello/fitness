<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTriggerTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER update_trigger_tests
                AFTER UPDATE ON tests
                FOR EACH ROW
                BEGIN
                    IF (NEW.deleted_at IS NOT NULL) OR (NEW.deleted_at IS NULL) THEN
                        UPDATE maximum_heart_rates SET deleted_at = NEW.deleted_at WHERE test_id = NEW.id;
                        UPDATE minimum_heart_rates SET deleted_at = NEW.deleted_at WHERE test_id = NEW.id;
                        UPDATE reserve_heart_rates SET deleted_at = NEW.deleted_at WHERE test_id = NEW.id;
                        UPDATE maximum_vo2 SET deleted_at = NEW.deleted_at WHERE test_id = NEW.id;
                        UPDATE training_vo2 SET deleted_at = NEW.deleted_at WHERE test_id = NEW.id;
                        UPDATE maximum_repeat SET deleted_at = NEW.deleted_at WHERE test_id = NEW.id;
                        UPDATE target_zones SET deleted_at = NEW.deleted_at WHERE test_id = NEW.id;
                        UPDATE flexitests SET deleted_at = NEW.deleted_at WHERE test_id = NEW.id;
                        UPDATE wells_banks SET deleted_at = NEW.deleted_at WHERE test_id = NEW.id;
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
        DB::unprepared('DROP TRIGGER IF EXISTS update_trigger_tests');
    }
}
