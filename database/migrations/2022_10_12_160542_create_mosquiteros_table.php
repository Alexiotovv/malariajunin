<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMosquiterosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mosquiteros', function (Blueprint $table) {
            $table->id();
            $table->string('Localidad', 150)->nullable()->default('');
            $table->bigInteger('IdProvincia')->unsigned();
            $table->foreign('IdProvincia')->references('id')->on('provincias')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('IdDistrito')->unsigned();
            $table->foreign('IdDistrito')->references('id')->on('distritos')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('IdEstablecimiento')->unsigned();//establecimiento mas cercano
            $table->foreign('IdEstablecimiento')->references('id')->on('establecimientos')->onDelete('cascade');
            $table->bigInteger('IdEstablecimientoMicroscopio')->unsigned();//establecimiento mas cercano con microscopio
            $table->foreign('IdEstablecimientoMicroscopio')->references('id')->on('establecimientos')->onDelete('cascade');
            $table->string('TiempoHorasEESS', 20)->nullable()->default('');
            $table->string('TiempoHorasEESSMicroscopio', 20)->nullable()->default('');
            $table->string('MedioTransporte', 25)->nullable()->default('');
            $table->tinyInteger('Hombres')->default(0);
            $table->tinyInteger('Mujeres')->default(0);
            $table->tinyInteger('Gestantes')->default(0);
            $table->tinyInteger('Menor5anos')->default(0);
            $table->tinyInteger('Mayor60anos')->default(0);
            $table->tinyInteger('NumeroCamas')->default(0);
            $table->tinyInteger('MosqImpregnadosBuenEstado')->default(0);
            $table->tinyInteger('MosqImpregnadosMalEstado')->default(0);
            $table->tinyInteger('MosqNoImpregnadosBuenEstado')->default(0);
            $table->tinyInteger('MosqNoImpregnadosMalEstado')->default(0);
            $table->tinyInteger('TamanoPersonal')->default(0);
            $table->tinyInteger('TamanoFamiliar')->default(0);
            $table->tinyInteger('delete')->default(0);
            $table->bigInteger('Usuario')->unsigned();
            $table->foreign('Usuario')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('mosquiteros');
    }
}
