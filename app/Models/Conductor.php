<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table = 'conductores';

    protected $fillable = [
        'nro_auto','name','surname','dueno_auto','dni','nro_brevete','direccion',
        'fecha_ingreso','observaciones','fechaA_setari','fechaV_setari','fechaA_soat',
        'fechaV_soat','fechaA_rt','fechaV_rt','fechaA_brevete','fechaV_brevete'
    ];

    //Relacion One to Many PagosMensuales
    public function pagoMensual(){
        return $this->hasMany('App\Models\PagoMensual');
    }

    //Relacion One to Many Ingresos y Egresos
    public function ingresosEgresos(){
        return $this->hasMany('App\Models\IngresosEgresos');
    }
}
