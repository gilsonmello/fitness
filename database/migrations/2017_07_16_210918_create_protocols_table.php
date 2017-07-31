<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtocolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocols', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('name');
            $table->string('formula');
            $table->longText('description')->nullable();
            $table->binary('is_active')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('test_protocol', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('test_id')->unsigned();
            $table->integer('protocol_id')->unsigned();
            $table->foreign('test_id')
                ->on('tests')
                ->references('id');
            $table->foreign('protocol_id')
                ->on('protocols')
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
        Schema::dropIfExists('test_protocol');
        Schema::dropIfExists('protocols');
    }
}
