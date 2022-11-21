<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbigeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubigeos', function (Blueprint $table) {
            $table->id();
            $table->string('UbigeoInei', 8)->nullable()->default('');
            $table->string('UbigeoReniec', 8)->nullable()->default('');
            $table->string('Departamento', 120)->nullable()->default('');
            $table->string('Provincia', 120)->nullable()->default('');
            $table->string('Distrito', 120)->nullable()->default('');
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
        Schema::dropIfExists('ubigeos');
    }
}
