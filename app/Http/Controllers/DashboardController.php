<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

class DashboardController extends Controller
{
    public function index() {       
         // $total_categorias = DB::table('categorias')->count();
         // $totalCategorias = Categoria::count();
         // dd($total_categorias);
        // return view('admin',  compact('totalCategorias'));
        return view('admin');
    }
}
