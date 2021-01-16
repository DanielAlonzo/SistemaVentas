<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    //
    protected $fillable = [
        'id', 'idusuario', 'idarticulo', 'motivo', 'unidades', 'costo', 'valor', 'fecha_hora'
    ];
    public function usuario(){
        return $this->belongsTo('App\User');
    }
    public function articulo(){
        return $this->belongsTo('App\Articulo');
    }
}
