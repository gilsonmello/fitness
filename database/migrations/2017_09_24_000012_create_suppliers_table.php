<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('district')->nullable();
            $table->string('zip', 9)->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('number')->nullable();
            $table->string('address_complement')->nullable();
            $table->string('cell_phone', 15)->nullable();
            $table->string('phone', 15)->nullable();
            $table->text('operation')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('suppliers_has_users', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('supplier_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('actual')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('supplier_id')
                ->on('suppliers')
                ->references('id');
            $table->foreign('user_id')
                ->on('users')
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
        Schema::dropIfExists('suppliers_has_users');
        Schema::dropIfExists('suppliers');
    }
}
