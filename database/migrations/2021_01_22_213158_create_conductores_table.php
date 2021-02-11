<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConductoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductores', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('nro_auto', 100);
            $table->string('name', 100);
            $table->string('surname', 200)->nullable();
            $table->string('dueno_auto', 200);
            $table->string('dni', 10)->nullable();
            $table->string('nro_brevete', 100)->nullable();
            $table->text('direccion')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->text('observaciones')->nullable();
            $table->date('fechaA_setari')->nullable();
            $table->date('fechaV_setari')->nullable();
            $table->date('fechaA_soat')->nullable();
            $table->date('fechaV_soat')->nullable();
            $table->date('fechaA_rt')->nullable();
            $table->date('fechaV_rt')->nullable();
            $table->date('fechaA_brevete')->nullable();
            $table->date('fechaV_brevete')->nullable();
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
        Schema::dropIfExists('conductores');
    }
}
