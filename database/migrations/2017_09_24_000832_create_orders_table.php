<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('coupon_id')->unsigned()->nullable();
            $table->integer('diary_id')->unsigned();
            $table->integer('diary_hour_id')->unsigned();
            $table->decimal('value');
            $table->decimal('value_discount')->nullable();
            $table->dateTime('date_confirmation')->nullable();
            $table->dateTime('date_cancel')->nullable();
            $table->integer('status_payment_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')
                ->on('users')
                ->references('id');
            $table->foreign('coupon_id')
                ->on('coupons')
                ->references('id');
            $table->foreign('diary_id')
                ->on('diaries')
                ->references('id');
            $table->foreign('diary_hour_id')
                ->on('diary_hours')
                ->references('id');
            $table->foreign('status_payment_id')
                ->on('status_payment')
                ->references('id');
        });

        Schema::create('orders_has_packages', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->decimal('price')->nullable();;
            $table->decimal('discount_price')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('order_id')
                ->on('orders')
                ->references('id');
            $table->foreign('package_id')
                ->on('packages')
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
        Schema::dropIfExists('orders_has_packages');
        Schema::dropIfExists('orders');
    }
}
