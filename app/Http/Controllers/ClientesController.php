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

    public function seleccionarCliente(Request $request){
        
        if(!$request->ajax())return redirect('/');
        $filtro = $request->filtro;
        $clientes = Cliente::where('nombre', 'like', '%'. $filtro . '%')
        ->orWhere('num_documento', 'like', '%'. $filtro . '%')
        ->select('id','nombre','num_documento')
        ->orderBy('nombre', 'asc')->get();

       

        return ['clientes' => $clientes];
    }
    public function store(Request $request)
    {
        
        if(!$request->ajax())return redirect('/');
        $clientes = new Cliente();
        $clientes->nombre = $request->nombre;
        $clientes->tipo_documento = $request->tipo_documento;
        $clientes->num_documento = $request->num_documento;
        $clientes->direccion = $request->direccion;
        $clientes->telefono = $request->telefono;
        $clientes->email = $request->email;
        $clientes->save();

    }

    public function update(Request $request)
    {
        
        if(!$request->ajax())return redirect('/');
        $clientes = Cliente::findOrFail($request->id);
        $clientes->nombre = $request->nombre;
        $clientes->tipo_documento = $request->tipo_documento;
        $clientes->num_documento = $request->num_documento;
        $clientes->direccion = $request->direccion;
        $clientes->telefono = $request->telefono;
        $clientes->email = $request->email;
        $clientes->save();
    }
}
