<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresosEgresos extends Model
{
    protected $table = 'ingresos_egresos';

    //Relacion Many to One Conductor
    public function conductor(){
        return $this->belongsTo('App\Models\Conductor', 'id_conductor');
    }
}
