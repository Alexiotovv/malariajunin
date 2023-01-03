<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapentoCuadrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapento_cuadros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Idred')->unsigned();
            $table->foreign('Idred')->references('id')->on('reds')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('Idmicrored')->unsigned();
            $table->foreign('Idmicrored')->references('id')->on('microreds')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('IdProvincia')->unsigned();
            $table->foreign('IdProvincia')->references('id')->on('provincias')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('IdDistrito')->unsigned();
            $table->foreign('IdDistrito')->references('id')->on('distritos')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('idLocalidad')->unsigned();
            $table->foreign('idLocalidad')->references('id')->on('localidades')->onDelete('cascade')->onUpdate('cascade')->after('idDistrito');
            $table->bigInteger('idEspecies')->unsigned();
            $table->foreign('idEspecies')->references('id')->on('especies')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tipo_mapeo', 10)->nullable()->default('');
            $table->string('mes', 5)->nullable()->default('');
            $table->string('ano', 4)->nullable()->default('');
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
        Schema::dropIfExists('mapento_cuadros');
    }
}
