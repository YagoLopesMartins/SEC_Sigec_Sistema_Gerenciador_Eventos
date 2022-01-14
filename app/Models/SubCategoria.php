<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubCategoria extends Model
{
    protected $table = 'sub_categorias';
    protected $primaryKey = 'subcategoria_id';
    protected $guarded = [];

    public $timestamps = true;

    protected $fillable = ['subcategoria_nome','subcategoria_estado','categoria_id'];
    /**
     * Relacionamento inverso (muitos para um)
     */
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id'); 
    }

    public function search($filter = null){
        $results = $this->where('subcategoria_nome', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }

}
