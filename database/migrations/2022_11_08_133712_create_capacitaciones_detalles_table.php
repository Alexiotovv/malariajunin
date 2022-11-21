<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitacionesDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacitaciones_detalles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('IdCapacitaciones')->unsigned();
            $table->foreign('IdCapacitaciones')->references('id')->on('capacitaciones')->onDelete('cascade')->onUpdate('cascade');
            $table->string('NombreMicroscopista', 100)->nullable()->default('');
            $table->string('ApellidoMicroscopista', 100)->nullable()->default('');
            $table->string('Concordancia', 5)->nullable()->default('');
            $table->date('UltimaCapacitacion')->nullable();
            $table->date('FechaUltEvalPanelLam')->nullable();
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
        Schema::dropIfExists('capacitaciones_detalles');
    }
}
