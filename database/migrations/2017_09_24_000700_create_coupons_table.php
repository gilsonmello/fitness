<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->decimal('percentage')->nullable();
            $table->decimal('value')->nullable();
            $table->dateTime('date_begin');
            $table->dateTime('date_end')->nullable();
            $table->integer('quantity_use')->nullable();
            $table->integer('used')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('coupons_has_users', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('coupon_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('coupon_id')
                ->on('coupons')
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
        Schema::dropIfExists('coupons_has_users');
        Schema::dropIfExists('coupons');
    }
}
