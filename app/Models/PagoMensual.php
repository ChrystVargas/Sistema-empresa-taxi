<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoMensual extends Model
{
    protected $table = 'pago_mensual';

    //Relacion Many to One Conductor
    public function conductor(){
        return $this->belongsTo('App\Models\Conductor', 'id_conductor');
    }
}
