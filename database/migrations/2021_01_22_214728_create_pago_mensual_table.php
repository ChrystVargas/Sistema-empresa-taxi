<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoMensualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_mensual', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_conductor')->unsigned();
            $table->double('monto',15,2);
            $table->timestamp('fecha_pago');
            $table->timestamps();
        });

        Schema::table('pago_mensual', function (Blueprint $table) {
            $table->foreign('id_conductor')->references('id')->on('conductores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pago_mensual');
    }
}
