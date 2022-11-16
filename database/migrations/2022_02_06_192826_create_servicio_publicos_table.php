<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioPublicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_publicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empresa');
            $table->string('cuenta_contrato');
            $table->string('medidor')->nullable();
            $table->string('ruta')->nullable();
            $table->string('clase_uso');
            $table->string('referencia')->nullable();
            $table->integer('fecha_estimada_pago')->nullable();
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
        Schema::dropIfExists('servicio_publicos');
    }
}
