<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Descuento;

class DescuentoController extends Controller
{
    //
    public function index(Request $request)
    {   
      if(!$request->ajax())return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
       
        if($buscar==''){
            $descuentos = Descuento::orderBy('id','desc')->paginate(10);
            //$roles = Roles::paginate(4);
        }else{
            $descuentos = Descuento::where($criterio, 'like', '%'. $buscar .'%')->orderBy('id','desc')->paginate(10);

        }
        

        return [
            'pagination' => [
                'total'             => $descuentos->total(),
                'current_page'      => $descuentos->currentPage(),
                'per_page'          => $descuentos->perPage(),
                'last_page'         => $descuentos->lastPage(),
                'from'              => $descuentos->firstItem(),
                'to'                => $descuentos->lastItem(),
            ],
            'descuentos' => $descuentos
        ];
        
    }
}
