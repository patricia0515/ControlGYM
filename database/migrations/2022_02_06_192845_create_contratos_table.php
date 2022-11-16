<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->float('canon', 8, 2);
            $table->integer('meses');
            $table->string('objeto');
            $table->unsignedBigInteger('arrendador_id');
            $table->foreign('arrendador_id')->references('id')->on('personas')->onDelete('cascade');
            $table->unsignedBigInteger('arrendatario_id');
            $table->foreign('arrendatario_id')->references('id')->on('personas')->onDelete('cascade');
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
        Schema::dropIfExists('contratos');
    }
}
