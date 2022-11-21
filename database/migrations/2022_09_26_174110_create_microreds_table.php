<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicroredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microreds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Idred')->unsigned();
            $table->foreign('Idred')->references('id')->on('reds')->onUpdate('cascade')->onDelete('cascade');
            $table->string('codigo_microred', 100)->nullable()->default('');
            $table->string('nombre_microred', 150)->nullable()->default('');
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
        Schema::dropIfExists('microreds');
    }
}
