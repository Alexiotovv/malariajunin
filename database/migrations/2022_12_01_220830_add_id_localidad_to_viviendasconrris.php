<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdLocalidadToViviendasconrris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('viviendasconrris', function (Blueprint $table) {
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
        Schema::table('viviendasconrris', function (Blueprint $table) {
            //
        });
        
    }
}
