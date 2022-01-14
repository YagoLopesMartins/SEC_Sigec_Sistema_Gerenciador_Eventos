<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitacaoEspacos extends Model
{

    protected $table = 'horarios_visitacao_espacos';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = true;

    protected $fillable = [
             'espaco_id', 
             'horario_visitacao_espacos_data', 
             'horario_visitacao_espacos_hora_inicio', 
             'horario_visitacao_espacos_hora_fim',
             'horario_visitacao_espacos_numero_vagas',
             'horario_visitacao_espacos_observacoes'
    ];

    public function search($filter = null){
        $results = $this->where('espaco_id', 'LIKE', "%{$filter}%")
                        // ->latest()
                        ->paginate();
        return $results;
    }
}
