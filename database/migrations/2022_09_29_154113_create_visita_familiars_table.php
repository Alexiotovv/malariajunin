<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitaFamiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visita_familiars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('IdFichaFamiliar')->unsigned();
            $table->foreign('IdFichaFamiliar')->references('id')->on('ficha_familiars')->onDelete('cascade')->onUpdate('cascade');
            $table->date('FechaVisita');
            $table->string('ResponsableVisita', 100)->nullable()->default('');
            $table->string('ResultadoVisita', 100)->nullable()->default('');
            $table->string('ProximaVisita', 100)->nullable()->default('');
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
        Schema::dropIfExists('visita_familiars');
    }
}
