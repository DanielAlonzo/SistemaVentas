<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table = 'proveedores';

    protected $fillable = [
        'id','contacto', 'telefono_contacto'
    ];

    public $timestamps = false;//Ya que la tabla proveedores no lleva estos campos

    public function persona(){
        return $this->belongsTo('App\Persona');
    }

    
}
