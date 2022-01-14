<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassificacaoIndicativa extends Model
{
    protected $table = 'classificacao_indicativa';
    protected $primaryKey = 'classificacao_indicativa_id';
    protected $guarded = [];

    public $timestamps = true;
    protected $fillable = ['classificacao_indicativa_titulo','classificacao_indicativa_descricao', 'classificacao_indicativa_simbolo'];

    public function search($filter = null){
        $results = $this->where('classificacao_indicativa_titulo', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }
}
