<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_expedicion');
            $table->string('periodo');
            $table->date('fecha_pago_oportuno');
            $table->string('mes');
            $table->float('total', 8, 2);
            $table->date('fecha_pagado')->nullable();
            $table->string('responsable')->nullable();
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('servicio_publicos_id');
            $table->foreign('servicio_publicos_id')->references('id')->on('servicio_publicos')->onDelete('cascade');
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
        Schema::dropIfExists('detalle_pagos');
    }
}
