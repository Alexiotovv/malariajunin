<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantbienesDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantbienes_detalles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('IdMantbienes')->unsigned();
            $table->foreign('IdMantbienes')->references('id')->on('mantbienes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Descripcion', 200)->nullable()->default('');
            $table->string('NumeroSerie', 100)->nullable()->default('');
            $table->string('Modelo', 100)->nullable()->default('');
            $table->string('Marca', 100)->nullable()->default('');
            $table->string('AnoFab', 10)->nullable()->default('');
            $table->string('AnoCompra', 10)->nullable()->default('');
            $table->string('Estado', 10)->nullable()->default('');
            $table->string('Observaciones', 200)->nullable()->default('');
            $table->date('MPreventivo')->nullable();
            $table->date('MCorrectivo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mantbienes_detalles');
    }
}
