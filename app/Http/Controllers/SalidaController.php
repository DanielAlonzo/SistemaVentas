<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salida;
class SalidaController extends Controller
{
    public function index(Request $request)
    {   
      if(!$request->ajax())return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
       
        if($buscar==''){
            $salidas = Salida::orderBy('id','desc')->paginate(10);
            //$roles = Roles::paginate(4);
        }else{
            $salidas = Salida::where($criterio, 'like', '%'. $buscar .'%')->orderBy('id','desc')->paginate(10);

        }
        

        return [
            'pagination' => [
                'total'             => $salidas->total(),
                'current_page'      => $salidas->currentPage(),
                'per_page'          => $salidas->perPage(),
                'last_page'         => $salidas->lastPage(),
                'from'              => $salidas->firstItem(),
                'to'                => $salidas->lastItem(),
            ],
            'salidas' => $salidas
        ];
        
    }
    //
}
