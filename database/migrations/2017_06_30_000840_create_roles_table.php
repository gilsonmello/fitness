<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('roles', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('name');
            $table->string('label');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('role_user', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');

            $table->integer('user_id')->unsigned();

            $table->integer('role_id')->unsigned();
            
            $table->softDeletes();
            
            $table->timestamps();
            
            $table->foreign('user_id')
                    ->on('users')
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
    public function down() {
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('roles');
    }

}
