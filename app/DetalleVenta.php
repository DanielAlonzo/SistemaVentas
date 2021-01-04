<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_ventas';
    //
    protected $fillable = [


        'idventa',
        'idarticulo',
        'cantidad',
        'precio',
        'descuento',
        'exonerado',
        'exento',
        'gravado_quince',
        'gravado_dieciocho'
    ];

    public $timestamps = false;
}
