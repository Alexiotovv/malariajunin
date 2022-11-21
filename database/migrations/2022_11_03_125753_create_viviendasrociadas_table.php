<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViviendasrociadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viviendasrociadas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('IdViviendasIRR')->unsigned();
            $table->foreign('IdViviendasIRR')->references('id')->on('viviendasconrris')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('NumeroViviendasRociadas');
            $table->date('FechaPrimerCiclo')->nullable();
            $table->date('FechaSegundoCiclo')->nullable();
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
        Schema::dropIfExists('viviendasrociadas');
    }
}
