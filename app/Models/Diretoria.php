<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diretoria extends Model
{
    protected $table = 'diretorias';
    protected $primaryKey = 'diretoria_id';
    protected $guarded = [];

    /**
     * Relacionamento inverso (muitos para um)
     */
    public function orgao(){
        return $this->belongsTo(Orgao::class, 'orgao_id'); 
    }

    public $timestamps = true;
    protected $fillable = ['diretoria_nome','diretoria_estado', 'orgao_id'];

    public function search($filter = null){
        $results = $this->where('diretoria_nome', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }
}
