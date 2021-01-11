<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;

class ArticuloController extends Controller
{
    //
    public function index(Request $request)
    {   
        if(!$request->ajax())return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
       
        if($buscar==''){
            $articulos = Articulo::join('categorias', 'articulos.idcategoria', '=', 'categorias.id')
            ->join('isv','articulos.tipoisv','=','isv.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo',
            'articulos.nombre', 'categorias.nombre as nombre_categoria','articulos.costo',
            'articulos.precio','articulos.stock','articulos.isv','articulos.tipoisv', 'isv.impuesto as tipo_isv',
             'articulos.descripcion', 'articulos.estado')->orderBy('articulos.id','desc')->paginate(10);
            
        }else{
            $articulos = Articulo::join('categorias', 'articulos.idcategoria', '=', 'categorias.id')
            ->join('isv','articulos.tipoisv','=','isv.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo',
            'articulos.nombre', 'categorias.nombre as nombre_categoria','articulos.costo',
            'articulos.precio','articulos.stock','articulos.isv','articulos.tipoisv', 'isv.impuesto as tipo_isv',
             'articulos.descripcion', 'articulos.estado')->where('articulos.'.$criterio, 'like', '%'. $buscar .'%')
             ->orderBy('articulos.id','desc')->paginate(10);


            

        }
        

        return [
            'pagination' => [
                'total'             => $articulos->total(),
                'current_page'      => $articulos->currentPage(),
                'per_page'          => $articulos->perPage(),
                'last_page'         => $articulos->lastPage(),
                'from'              => $articulos->firstItem(),
                'to'                => $articulos->lastItem(),
            ],
            'articulos' => $articulos
        ];
    }

    public function listarArticulo(Request $request)
    {   
        if(!$request->ajax())return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
       
        if($buscar==''){
            $articulos = Articulo::join('categorias', 'articulos.idcategoria', '=', 'categorias.id')
          
            ->select('articulos.id','articulos.idcategoria','articulos.codigo',
            'articulos.nombre', 'categorias.nombre as nombre_categoria',
            'articulos.precio','articulos.stock',
             'articulos.descripcion', 'articulos.estado')->orderBy('articulos.id','desc')->paginate(10);
            
        }else{

            $articulos = Articulo::join('categorias', 'articulos.idcategoria', '=', 'categorias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo',
            'articulos.nombre', 'categorias.nombre as nombre_categoria',
            'articulos.precio','articulos.stock',
             'articulos.descripcion', 'articulos.estado')->where('articulos.'.$criterio, 'like', '%'. $buscar .'%')
             ->orderBy('articulos.id','desc')->paginate(10);


            

        }
        

        return ['articulos' => $articulos];
    }
    
    public function listarArticuloVenta(Request $request)
    {   
        if(!$request->ajax())return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
       
        if($buscar==''){
            $articulos = Articulo::join('categorias', 'articulos.idcategoria', '=', 'categorias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo',
            'articulos.nombre', 'categorias.nombre as nombre_categoria',
            'articulos.precio','articulos.stock',
             'articulos.descripcion', 'articulos.estado')->where('articulos.stock', '>', '0')
             ->orderBy('articulos.id','desc')->paginate(10);
            
        }else{

            $articulos = Articulo::join('categorias', 'articulos.idcategoria', '=', 'categorias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo',
            'articulos.nombre', 'categorias.nombre as nombre_categoria',
            'articulos.precio','articulos.stock',
             'articulos.descripcion', 'articulos.estado')->where('articulos.'.$criterio, 'like', '%'. $buscar .'%')
             ->where('articulos.stock', '>', '0')
             ->orderBy('articulos.id','desc')->paginate(10);


            

        }
        

        return ['articulos' => $articulos];
    }
    

    public function buscarArticulo(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $articulos = Articulo::where('codigo','=', $filtro)
        ->select('id','nombre')->orderBy('nombre', 'asc')->take(1)->get();

        return ['articulos' => $articulos];
    }
     
    public function buscarArticuloVenta(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $articulos = Articulo::where('codigo','=', $filtro)
        ->select('id','nombre', 'stock', 'precio')
        ->where('stock', '>', '0')
        ->orderBy('nombre', 'asc')->take(1)->get();

        return ['articulos' => $articulos];
    }

    public function store(Request $request)
    {
        if(!$request->ajax())return redirect('/');
        $articulo = new Articulo();
        $articulo->idcategoria = $request->idcategoria;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->costo = $request->costo;
        $articulo->precio = $request->precio;
        $articulo->stock = $request->stock;
        $articulo->isv = $request->isv;
        $articulo->tipoisv = $request->tipoisv;
        $articulo->descripcion = $request->descripcion;
        $articulo->estado = '1';
        $articulo->save();

    }

    


    public function update(Request $request)
    {
        //
        if(!$request->ajax())return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->idcategoria = $request->idcategoria;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->costo = $request->costo;
        $articulo->precio = $request->precio;
        $articulo->stock = $request->stock;
        $articulo->isv = $request->isv;
        $articulo->tipoisv = $request->tipoisv;
        $articulo->descripcion = $request->descripcion;
        $articulo->estado = '1';
        $articulo->save();
       
    }
    public function desactivar(Request $request)
    {
        if(!$request->ajax())return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->estado = '0';
        $articulo->save();
    }
    public function activar(Request $request)
    {
        if(!$request->ajax())return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->estado = '1';
        $articulo->save();
    }
  
}
