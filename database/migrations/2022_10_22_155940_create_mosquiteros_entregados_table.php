<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMosquiterosEntregadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mosquiteros_entregados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Departamento')->unsigned();
            $table->foreign('Departamento')->references('id')->on('departamentos')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('Provincia')->unsigned();
            $table->foreign('Provincia')->references('id')->on('provincias')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('Distrito')->unsigned();
            $table->foreign('Distrito')->references('id')->on('distritos')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('Ipress')->unsigned();
            $table->foreign('Ipress')->references('id')->on('establecimientos')->onUpdate('cascade');
            
            $table->bigInteger('idLocalidad')->unsigned();
            $table->foreign('idLocalidad')->references('id')->on('localidades')->onDelete('cascade')->onUpdate('cascade');
            
            $table->date('FechaEntrega')->nullable();
            $table->date('FechaMonitoreo')->nullable();
            $table->string('NumeroMonitoreo', 100)->nullable()->default('text');
            $table->string('Responsable', 100)->nullable()->default('-');
            $table->string('CargoResponsable', 100)->nullable()->default('-');
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
        Schema::dropIfExists('mosquiteros_entregados');
    }
}
