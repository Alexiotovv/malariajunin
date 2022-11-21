<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestadoMosqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestado_mosqs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idMonitoreo')->unsigned();
            $table->foreign('idMonitoreo')->references('id')->on('mosquiteros_entregados')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Nombre', 100)->nullable()->default('');
            $table->string('Apellido', 100)->nullable()->default('');
            $table->string('Edad', 20)->nullable()->default('');
            $table->string('DNI', 20)->nullable()->default('');
            //Informacion de la Familia
            $table->string('NPersonasFemenino', 20)->nullable()->default('');
            $table->string('NPersonasMasculino', 20)->nullable()->default('');
            $table->string('NEmbarazadas', 20)->nullable()->default('');
            $table->string('NNinosMenor5', 20)->nullable()->default('');
            $table->string('NCamasDormir', 20)->nullable()->default('');
            //cobertura de uso de otros mosquiteros
            $table->string('NMosqTela', 20)->nullable()->default('');
            $table->string('NMosqMTILDAntiguo', 20)->nullable()->default('');
            //CObertura de uso de MTILD en la vivienda
            $table->string('NMTILDEntregados', 20)->nullable()->default('');
            $table->string('NMTILDUso', 20)->nullable()->default('');
            $table->string('NPersonasUsanMosqFemenino', 20)->nullable()->default('');
            $table->string('NPersonasUsanMosqMasculino', 20)->nullable()->default('');
            $table->string('NEmbarazadasUsanMosq', 20)->nullable()->default('');
            $table->string('NNinosMenor5UsanMosq', 20)->nullable()->default('');
            $table->string('NMTILDSinUso', 20)->nullable()->default('');
            $table->string('RazonNoUso', 20)->nullable()->default('');
            //Condiciones del MTILD
            $table->string('NLimpios', 20)->nullable()->default('');
            $table->string('NSucios', 20)->nullable()->default('');
            $table->string('NRotos', 20)->nullable()->default('');
            //Frecuencia de uso MTILD de la semana Anterior
            $table->string('N6_7Noches', 20)->nullable()->default('');
            $table->string('N1_5Noches', 20)->nullable()->default('');
            $table->string('N0Noches', 20)->nullable()->default('');
            //MTILD Lavado en los ultimos 3 meses
            $table->string('NMTILDLavados', 20)->nullable()->default('');
            $table->string('NLavadoCorrecto', 20)->nullable()->default('');
            $table->string('NLavadoIncorrecto', 20)->nullable()->default('');
            //donde
            $table->string('RioLago', 20)->nullable()->default('');
            $table->string('BandejaOtro', 20)->nullable()->default('');
            //Forma de Secado
            $table->string('Sol', 20)->nullable()->default('');
            $table->string('Sombra', 20)->nullable()->default('');
            //Manejo Adecuado
            $table->string('Colgado', 20)->nullable()->default('');
            $table->string('RecogidoDia', 20)->nullable()->default('');
            $table->string('GuardadoDia', 20)->nullable()->default('');
            //Reacciones Secundarias
            $table->string('Embarazadas', 20)->nullable()->default('');
            $table->string('NinosMenor5', 20)->nullable()->default('');
            $table->string('OtrasPersonas', 20)->nullable()->default('');
            $table->string('TipoReaccion1', 20)->nullable()->default('');
            $table->string('TipoReaccion2', 20)->nullable()->default('');
            $table->string('TipoReaccion3', 20)->nullable()->default('');
            $table->string('TipoReaccion4', 20)->nullable()->default('');
            $table->string('TipoReaccion5', 20)->nullable()->default('');
            $table->string('TipoReaccion6', 20)->nullable()->default('');
            $table->string('Informante', 20)->nullable()->default('');
            $table->string('Observaciones', 200)->nullable()->default('');

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
        Schema::dropIfExists('encuestado_mosqs');
    }
}
