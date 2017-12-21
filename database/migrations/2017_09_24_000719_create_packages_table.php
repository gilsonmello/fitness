<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->integer('validity');
            $table->decimal('value');
            $table->string('img')->default('default.png');
            $table->string('img_discount')->nullable();
            $table->dateTime('begin_discount')->nullable();
            $table->dateTime('end_discount')->nullable();
            $table->decimal('value_discount')->nullable();
            $table->boolean('is_active')->default(1);
            $table->text('meta_description')->nullable();
            $table->text('meta_title')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('coupons_has_packages', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('coupon_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->foreign('coupon_id')
                ->on('coupons')
                ->references('id');
            $table->foreign('package_id')
                ->on('packages')
                ->references('id');
        });

        Schema::create('categories_has_packages', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('categorie_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->foreign('categorie_id')
                ->on('categories')
                ->references('id');
            $table->foreign('package_id')
                ->on('packages')
                ->references('id');
        });

        Schema::create('discount_suppliers_packages', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('supplier_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->decimal('value')->nullable();
            $table->decimal('percentage')->nullable();
            $table->foreign('supplier_id')
                ->on('suppliers')
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
        Schema::dropIfExists('discount_suppliers_packages');
        Schema::dropIfExists('categories_has_packages');
        Schema::dropIfExists('coupons_has_packages');
        Schema::dropIfExists('packages');
    }
}
