<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class createTriggerTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER create_trigger_tests
                AFTER INSERT ON tests
                FOR EACH ROW
                BEGIN
                    INSERT INTO maximum_heart_rates (test_id, protocol_id, result, created_at, updated_at) VALUES(
                        NEW.id,
                        1,
                        100.00,
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
        DB::unprepared('DROP TRIGGER create_trigger_tests');
    }
}
