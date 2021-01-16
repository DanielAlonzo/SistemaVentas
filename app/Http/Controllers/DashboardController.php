<?php

namespace App\Http\Controllers;
use Iluminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    // public function __invoke(Request $request)
    // {
    //     // ...
    //     $anio=date('Y');
    //     $ingresos=DB::table('ingresos as i')
    //     ->select(DB::raw('MONTH(i.fecha_hora) as mes'), 
    //     DB::raw('YEAR(i.fecha_hora) as anio'),
    //     DB::raw('SUM(i.total) as total'))

    // }
}
