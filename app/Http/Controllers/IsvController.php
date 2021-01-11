<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Isv;

class IsvController extends Controller
{
    //
    
    public function seleccionarIsv(Request $request){
        if(!$request->ajax())return redirect('/');

        $isvs = Isv::select('id','impuesto')->orderBy('id', 'asc')->get();

      

        return ['isvs' => $isvs];
    }
}
