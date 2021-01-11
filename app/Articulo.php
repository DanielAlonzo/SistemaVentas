<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    protected $fillable =[
        'idcategoria', 'codigo', 'nombre','costo', 'precio', 'stock','isv','tipoisv', 'descripcion', 'estado'
    ];
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
    public function isv(){
        return $this->belongsTo('App\Isv');
    }
}
