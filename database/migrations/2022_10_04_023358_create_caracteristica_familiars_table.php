<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristicaFamiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristica_familiars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('IdFichaFamiliar')->unsigned();
            $table->foreign('IdFichaFamiliar')->references('id')->on('ficha_familiars')->onDelete('cascade')->onUpdate('cascade');
            $table->string('IngresoMensual', 10)->nullable()->default('');
            $table->boolean('AguaTratamiento')->nullable()->default(false);
            $table->boolean('AguaSinTratamiento')->nullable()->default(false);
            $table->boolean('RedPublicaDentro')->nullable()->default(false);
            $table->boolean('RedPublicaFuera')->nullable()->default(false);
            $table->boolean('PozoCisterna')->nullable()->default(false);
            $table->boolean('RioAcequia')->nullable()->default(false);
            $table->boolean('PisoMadera')->nullable()->default(false);
            $table->boolean('PisoParquet')->nullable()->default(false);
            $table->boolean('PisoLosetas')->nullable()->default(false);
            $table->boolean('PisoCementLadrillo')->nullable()->default(false);
            $table->boolean('PisoTierra')->nullable()->default(false);
            $table->boolean('PisoOtros')->nullable()->default(false);
            $table->boolean('CombustibleLena')->nullable()->default(false);
            $table->boolean('CombustibleCarbon')->nullable()->default(false);
            $table->boolean('CombustibleBosta')->nullable()->default(false);
            $table->boolean('CombustibleGasElectricidad')->nullable()->default(false);
            $table->boolean('PersonasHabitacion3Miembros')->nullable()->default(false);
            $table->boolean('PersonasHabitacion4Mas')->nullable()->default(false);
            $table->integer('PersonasHabitacion4MasNumero')->nullable()->default(12);
            $table->integer('PersonasHabitacion3MiembroNumero')->nullable()->default(12);
            $table->boolean('ParedMaderaEstera')->nullable()->default(false);
            $table->boolean('ParedAdobeTapia')->nullable()->default(false);
            $table->boolean('ParedCementoLadrillo')->nullable()->default(false);
            $table->boolean('ParedQuincha')->nullable()->default(false);
            $table->boolean('ParedOtros')->nullable()->default(false);
            $table->boolean('ConseAlimTemperaturaAmbiente')->nullable()->default(false);
            $table->boolean('ConseAlimRefrigeradora')->nullable()->default(false);
            $table->boolean('ConseAlimRecipienteConTapa')->nullable()->default(false);
            $table->boolean('ConseAlimRecipienteSinTapa')->nullable()->default(false);
            $table->boolean('TransporteAutomovil')->nullable()->default(false);
            $table->boolean('TransporteBicicleta')->nullable()->default(false);
            $table->boolean('TransporteMotoBicicleta')->nullable()->default(false);
            $table->boolean('TransporteOtros')->nullable()->default(false);
            $table->boolean('TechoCalamina')->nullable()->default(false);
            $table->boolean('TechoMaderaTeja')->nullable()->default(false);
            $table->boolean('TechoNoble')->nullable()->default(false);
            $table->boolean('TechoEthernit')->nullable()->default(false);
            $table->boolean('TechoPajasHojas')->nullable()->default(false);
            $table->boolean('TechoCanaEstera')->nullable()->default(false);
            $table->boolean('ExcretasAireLibre')->nullable()->default(false);
            $table->boolean('ExcretasAcequiaCanal')->nullable()->default(false);
            $table->boolean('ExcretasRedPublica')->nullable()->default(false);
            $table->boolean('ExcretasLetrina')->nullable()->default(false);
            $table->boolean('ExcretasPozoSeptico')->nullable()->default(false);
            $table->boolean('ExcretasOtros')->nullable()->default(false);
            $table->boolean('BasuraCarroRecolector')->nullable()->default(false);
            $table->boolean('BasuraCampoAbierto')->nullable()->default(false);
            $table->boolean('BasuraRio')->nullable()->default(false);
            $table->boolean('BasuraEntierraQuema')->nullable()->default(false);
            $table->boolean('BasuraPozo')->nullable()->default(false);
            $table->boolean('BasuraOtros')->nullable()->default(false);
            $table->boolean('ServDomicilioTelefono')->nullable()->default(false);
            $table->boolean('ServDomicilioInternet')->nullable()->default(false);
            $table->boolean('ServDomicilioCable')->nullable()->default(false);
            $table->boolean('ServDomicilioElectricidad')->nullable()->default(false);
            $table->boolean('ServDomicilioAgua')->nullable()->default(false);
            $table->boolean('ServDomicilioDesague')->nullable()->default(false);
            $table->boolean('RiesgoLluviasInundaciones')->nullable()->default(false);
            $table->boolean('RiesgoBasuraJuntoVivienda')->nullable()->default(false);
            $table->boolean('RiesgoInserviblesJuntoVivienda')->nullable()->default(false);
            $table->boolean('RiesgoHumosVaporesFabricas')->nullable()->default(false);
            $table->boolean('RiesgoDerrumbesHuaycos')->nullable()->default(false);
            $table->boolean('RiesgoPandillajeDelincuencia')->nullable()->default(false);
            $table->boolean('RiesgoAlcoholismoDrogadiccion')->nullable()->default(false);
            $table->boolean('RiesgoSinAlumbradoPublico')->nullable()->default(false);
            $table->boolean('RiesgoPistasNoAsfaltadas')->nullable()->default(false);
            $table->boolean('RiesgoVectores')->nullable()->default(false);
            $table->boolean('RiesgoOtros')->nullable()->default(false);
            $table->boolean('AnimalPerroGato')->nullable()->default(false);
            $table->boolean('AnimalCabrasCarneros')->nullable()->default(false);
            $table->boolean('AnimalConvive')->nullable()->default(false);

            $table->string('AnimalPerroGatoVacuna', 3)->nullable()->default('');
            $table->string('AnimalCabrasCarnerosVacuna', 3)->nullable()->default('');
            $table->string('AnimalConviveVacuna', 3)->nullable()->default('');
            /////
            $table->string('ViviendasInfraRiesgo', 3)->nullable()->default('');
            $table->string('ViviendasInfraRiesgoDescribir', 200)->nullable()->default('--');
            $table->string('ViviendaPresenciaVectores', 3)->nullable()->default('');
            $table->string('ViviendaPresenciaVectoresDescribir', 200)->nullable()->default('--');

            $table->string('MochilaEmergencia', 3)->nullable()->default('');
            $table->string('BotiquinEmergencia', 3)->nullable()->default('');
            $table->string('ViviendaEspacioAlimentos', 3)->nullable()->default('');
            $table->string('CocinaVentilacionHumo', 3)->nullable()->default('');
            $table->string('Television', 3)->nullable()->default('-');
            $table->string('Radio', 3)->nullable()->default('-');
            $table->string('TelevisionPorque', 150)->nullable()->default('--');
            $table->string('RadioPorque', 150)->nullable()->default('--');

            //preguntar porque y otros
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
        Schema::dropIfExists('caracteristica_familiars');
    }
}
