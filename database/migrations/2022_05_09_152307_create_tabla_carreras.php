<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaCarreras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("titulo_carrera");
            $table->string("descripcion_carrera");
            $table->string("url_amigable");
            $table->unsignedBigInteger('id_campus')->unsigned();
            $table->foreign('id_campus')->references('id')->on('campues')->onDelete('cascade');
            $table->unsignedBigInteger('id_tipocarrera')->unsigned();
            $table->foreign('id_tipocarrera')->references('id')->on('tipocarreras')->onDelete('cascade');
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
        Schema::dropIfExists('carreras');
    }
}
