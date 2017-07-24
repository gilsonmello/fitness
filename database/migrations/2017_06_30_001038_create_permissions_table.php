<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('name');
            $table->string('label');
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::create('permission_role', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            
            $table->integer('permission_id')->unsigned();
            
            $table->integer('role_id')->unsigned();
            
            $table->timestamps();
            
        });
        
        Schema::table('permission_role', function($table) {
            $table->foreign('permission_id')
                    ->on('permissions')
                    ->references('id');
            
            $table->foreign('role_id')
                    ->on('roles')
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
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('permissions');
    }
}
