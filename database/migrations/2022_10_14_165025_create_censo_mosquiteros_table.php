<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCensoMosquiterosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('censo_mosquiteros', function (Blueprint $table){
            $table->id();
            $table->bigInteger('IdFichaMosquitero')->unsigned();
            $table->foreign('IdFichaMosquitero')->references('id')->on('Mosquiteros')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('NumeroMosquitero')->default(0);
            $table->tinyInteger('CantidadUsan')->default(0);
            $table->string('Tamano', 1)->nullable()->default('');
            $table->string('BuenEstado', 2)->nullable()->default('');
            $table->string('Impregnado', 2)->nullable()->default('');
            $table->date('FechaImpregnacion');
            $table->string('InsecticidaUsado', 50)->nullable()->default('');
            $table->string('Material', 50)->nullable()->default('');
            $table->string('Color', 50)->nullable()->default('');
            $table->string('JefeHogar', 100)->nullable()->default('');
            $table->string('DniJefeHogar', 15)->nullable()->default('');
            $table->string('ResponsableCenso', 50)->nullable()->default('');
            $table->string('DniResponsableCenso', 15)->nullable()->default('');
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
        Schema::dropIfExists('censo_mosquiteros');
    }
}
