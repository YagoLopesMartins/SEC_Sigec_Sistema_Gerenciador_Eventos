<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orgao extends Model
{
    protected $table = 'orgaos';
    protected $primaryKey = 'orgao_id';
    protected $guarded = [];

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usuario_id'); 
    }

    public $timestamps = true;
    protected $fillable = ['orgao_nome','orgao_estado', 'orgao_sigla'];

    public function search($filter = null){
        $results = $this->where('orgao_nome', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }
}
