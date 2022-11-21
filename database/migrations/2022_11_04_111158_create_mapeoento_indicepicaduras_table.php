<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapeoentoIndicepicadurasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapeoento_indicepicaduras', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('IdMapeoEnto')->unsigned();
            $table->foreign('IdMapeoEnto')->references('id')->on('mapeoentos')->onDelete('cascade')->onUpdate('cascade');
            $table->date('fecha');
            $table->string('indicehombrehora', 50)->nullable()->default('');
            $table->string('indicehombrenoche', 50)->nullable()->default('');
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
        Schema::dropIfExists('mapeoento_indicepicaduras');
    }
}
