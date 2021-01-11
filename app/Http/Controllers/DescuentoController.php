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
    public function seleccionarDescuento(Request $request){
        if(!$request->ajax())return redirect('/');

        $descuentos = Descuento::select('id','tipodescuento')->orderBy('id', 'asc')->get();

      

        return ['descuentos' => $descuentos];
    }

    public function buscarDescuentoVenta(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $descuentos = Descuento::where('id','=', $filtro)
        ->select('id','tipodescuento', 'valor')
       
        ->orderBy('tipodescuento', 'asc')->take(1)->get();

        return ['descuentos' => $descuentos];
    }
}
