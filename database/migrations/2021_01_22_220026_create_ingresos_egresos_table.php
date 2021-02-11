<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosEgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos_egresos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_conductor')->unsigned();
            $table->text('observaciones');
            $table->double('monto',15,2);
            $table->string('tipo',100);
            $table->timestamps();
        });

        Schema::table('ingresos_egresos', function (Blueprint $table) {
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
        Schema::dropIfExists('ingresos_egresos');
    }
}
