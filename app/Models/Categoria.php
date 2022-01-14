<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'categoria_id';
    protected $guarded = [];

    public $timestamps = true;
    protected $fillable = ['categoria_nome','categoria_estado'];

    public function search($filter = null){
        $results = $this->where('categoria_nome', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }

    // public function subcategoriasFiltroPorCategoria($categoria_id = 1)
    // {
    //     $results = 
    //         DB::table('categorias as cat')
    //         ->join('sub_categorias as sub', 'cat.', '=', '')
    //         ->select('', '', '','', '')
    //         ->where("categoria_id", "=", $categoria_id)
    //         ->where('', '', '')
    //         ->orderBy('', '')
    //         ->paginate(3);

    //     dd($results);
    //     return $results;
    // }
}