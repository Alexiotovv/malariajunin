<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiembrosFamiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros_familiars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('IdFichaFamiliar')->unsigned();
            $table->foreign('IdFichaFamiliar')->references('id')->on('ficha_familiars')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Nombres', 150)->nullable()->default('');
            $table->string('Apellidos', 150)->nullable()->default('');
            $table->string('Edad', 10)->nullable()->default('');
            $table->string('TipoEdad', 10)->nullable()->default('');//años o meses
            $table->string('Sexo', 1)->nullable()->default('');
            $table->string('NumeroDocumento', 150)->nullable()->default('');
            $table->string('TipoDocumento', 50)->nullable()->default('');//dni o carnet extranjeria
            $table->date('FechaNacimiento');
            $table->string('Parentesco', 50)->nullable()->default('');
            $table->string('EstadoCivil', 50)->nullable()->default('');
            $table->string('GradoInstruccion', 50)->nullable()->default('');
            $table->string('Ocupacion', 50)->nullable()->default('');
            $table->string('CondicionOcupacion', 100)->nullable()->default('');
            $table->string('SeguroSalud', 50)->nullable()->default('');//SIS-ESSALUD,FFAA,PNP,SIN SEGURO
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
        Schema::dropIfExists('miembros_familiars');
    }
}
