<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerencia extends Model
{
    protected $table = 'gerencias';
    protected $primaryKey = 'gerencia_id';
    protected $guarded = [];

       /**
     * Relacionamento inverso (muitos para um)
     */
    public function diretoria(){
        return $this->belongsTo(Diretoria::class, 'diretoria_id'); 
    }

    public $timestamps = true;
    protected $fillable = ['gerencia_nome','gerencia_estado', 'diretoria_id'];

    public function search($filter = null){
        $results = $this->where('gerencia_nome', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }
}
