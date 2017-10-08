<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePregasCutaneasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregas_cutaneas', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('evaluation_id')->unsigned();
            $table->decimal('biceps')->nullable();
            $table->decimal('triceps')->nullable();
            $table->decimal('subescapular')->nullable();
            $table->decimal('peitoral')->nullable();
            $table->decimal('supra_ilíaca')->nullable();
            $table->decimal('coxa')->nullable();
            $table->decimal('abdominal')->nullable();
            $table->decimal('panturrilha')->nullable();
            $table->decimal('axilar_media')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('evaluation_id')
                ->on('evaluations')
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
        Schema::dropIfExists('pregas_cutaneas');
    }
}
