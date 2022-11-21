<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaFamiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_familiars', function (Blueprint $table) {
            $table->id();
            $table->string('Multifamiliar', 2)->nullable()->default('');
            $table->string('Gerencia', 100)->nullable()->default('');
            $table->bigInteger('Idred')->unsigned();
            $table->foreign('Idred')->references('id')->on('reds')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('Idmicrored')->unsigned();
            $table->foreign('Idmicrored')->references('id')->on('microreds')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('IdEstablecimiento')->unsigned();
            $table->foreign('IdEstablecimiento')->references('id')->on('establecimientos')->onDelete('cascade');
            $table->bigInteger('IdProvincia')->unsigned();
            $table->foreign('IdProvincia')->references('id')->on('provincias')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('IdDistrito')->unsigned();
            $table->foreign('IdDistrito')->references('id')->on('distritos')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('Localidad', 150)->nullable()->default('');
            $table->string('Sector', 100)->nullable()->default('');
            $table->string('Arearesidencia', 100)->nullable()->default('');
            $table->string('Telefonocelular', 100)->nullable()->default('');
            $table->string('Direccionvivienda', 150)->nullable()->default('');
            $table->string('TelefoOtrapersona', 100)->nullable()->default('');
            $table->string('TiempoEESSCercano', 20)->nullable()->default('');
            $table->string('MedioTransporte', 25)->nullable()->default('');
            $table->string('TiempoResidencia', 20)->nullable()->default('');
            $table->string('ResidenciasAnteriores', 20)->nullable()->default('');
            $table->string('DisponibilidadProximasVisitas', 20)->nullable()->default('');
            $table->string('CorreoElectronico', 60)->nullable()->default('');
            $table->string('Referencia', 100)->nullable()->default('');
            $table->date('FechaUltimoRociadoResidual');
            $table->tinyInteger('Ninos');
            $table->tinyInteger('Adolescentes');
            $table->tinyInteger('Jovenes');
            $table->tinyInteger('Adultos');
            $table->tinyInteger('AdultosMayores');
            $table->string('EtniaRaza', 150)->nullable()->default('');
            $table->string('IdiomaPredominante', 100)->nullable()->default('');
            $table->string('Religion', 100)->nullable()->default('');
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
        Schema::dropIfExists('ficha_familiars');
    }
}
