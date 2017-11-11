<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaries', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->increments('id');
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->date('available_date');
            $table->longText('description')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('supplier_id')
                ->on('suppliers')
                ->references('id');
        });
        
        Schema::create('diary_hours', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->increments('id');
            $table->integer('diary_id')->unsigned();
            $table->time('available_hour');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('diary_id')
                ->on('diaries')
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
        Schema::dropIfExists('diary_hours');
        Schema::dropIfExists('diaries');
    }
}
