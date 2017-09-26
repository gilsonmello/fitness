<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->boolean('gender')->default(1)->after('is_active')->comment = "Masculino 0, Feminino 1";
            $table->string('zip_code', 9)->nullable();
            $table->string('address')->nullable();
            $table->string('address_complement', 100)->nullable();
            $table->string('address_number', 10)->nullable();   
            $table->string('district', 100)->nullable();
            $table->string('state', 2)->nullable();
            $table->dateTime('last_access')->nullable();
            $table->string('ip_address')->nullable();
            $table->boolean('is_newsletter_subscriber')->nullable()->comment = "Nao 0, Sim 1";
            $table->string('last_session_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('gender');
            $table->dropColumn('zip_code');
            $table->dropColumn('address');
            $table->dropColumn('address_complement');
            $table->dropColumn('address_number');
            $table->dropColumn('district');
            $table->dropColumn('state');
            $table->dropColumn('last_access');
            $table->dropColumn('ip_address');
            $table->dropColumn('is_newsletter_subscriber');
            $table->dropColumn('last_session_id');
        });
    }
}
