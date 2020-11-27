<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    protected $fillable =[
        'idcategoria', 'codigo', 'nombre', 'precio', 'stock', 'descripcion', 'estado'
    ];
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}
