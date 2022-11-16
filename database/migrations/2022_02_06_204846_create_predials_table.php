<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('year');
            $table->float('avaluo', 9, 2);
            $table->float('total_pagar', 9, 2);
            $table->date('fecha_pago_oportuno');
            $table->date('fecha_pagado')->nullable();
            $table->string('responsable')->nullable();
            $table->string('entidad_financiera')->nullable();
            $table->unsignedBigInteger('predio_id');
            $table->foreign('predio_id')->references('id')->on('predios')->onDelete('cascade');
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
        Schema::dropIfExists('predials');
    }
}
