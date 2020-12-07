<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $fiallable = [
        'idcliente',
        'idusuario',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'cai',
        'rango',
        'fecha_hora',
        'impuesto',
        'total',
        'estado'
    ];
}
