<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
{
    //
    public function index(Request $request)
    {   
        if(!$request->ajax())return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
       
        if($buscar==''){
            $clientes = Cliente::orderBy('id','desc')->paginate(10);
            //$categorias = Categoria::paginate(4);
        }else{
            $clientes = Cliente::where($criterio, 'like', '%'. $buscar .'%')->orderBy('id','desc')->paginate(10);

        }
        

        return [
            'pagination' => [
                'total'             => $clientes->total(),
                'current_page'      => $clientes->currentPage(),
                'per_page'          => $clientes->perPage(),
                'last_page'         => $clientes->lastPage(),
                'from'              => $clientes->firstItem(),
                'to'                => $clientes->lastItem(),
            ],
            'clientes' => $clientes
        ];
        //return $categorias;
    }
}
