<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('IdMicrored')->unsigned();
            $table->foreign('IdMicrored')->references('id')->on('microreds')->onDelete('cascade')->onUpdate('cascade');
            $table->string('codigo', 100)->default('');
            $table->string('nombre_establecimiento', 150)->nullable()->default('');
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
        Schema::dropIfExists('establecimientos');
    }
}
