<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdLocalidadToMapeoentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mapeoentos', function (Blueprint $table) {
            $table->bigInteger('idLocalidad')->unsigned();
            $table->foreign('idLocalidad')->references('id')->on('localidades')->onDelete('cascade')->onUpdate('cascade')->after('idDistrito');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mapeoentos', function (Blueprint $table) {
            //
        });
    }
}
