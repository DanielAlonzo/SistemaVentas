<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $fillable = [
        'idusuario',
        'idcliente',
        'num_factura',
        'num_exonerada',
        'num_exenta',
        'num_sag',
        'fecha_hora',
        'impuesto',
        'total',
        'estado'
    ];
}
