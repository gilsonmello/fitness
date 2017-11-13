<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->integer('diary_id')->unsigned();
            $table->integer('diary_hour_id')->unsigned();
            $table->dateTime('date_begin')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('order_id')
                ->on('orders')
                ->references('id');
            $table->foreign('user_id')
                ->on('users')
                ->references('id');
            $table->foreign('package_id')
                ->on('packages')
                ->references('id');
            $table->foreign('diary_id')
                ->on('diaries')
                ->references('id');
            $table->foreign('diary_hour_id')
                ->on('diary_hours')
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
        Schema::dropIfExists('schedules');
    }
}
