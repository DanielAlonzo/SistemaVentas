<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_ventas';
    //
    protected $fiallable = [


        'idventa',
        'idarticulo',
        'cantidad',
        'precio',
        'descuento',
        'exento',
        'grabado_quince',
        'grabado_dieciocho'
    ];

    public $timestamps = false;
}
