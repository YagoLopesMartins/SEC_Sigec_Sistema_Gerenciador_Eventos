<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendamentoVisitacao extends Model
{
    protected $table = 'agendamento_visitacaos';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = true;

    public function horarios(){
        return $this->hashOne(HorariosVisitacao::class); 
    }

    protected $fillable = [
        'uuid',
        // Visitante
        'naturalidade', 'cpf','passaporte','nome_completo','data_nascimento',
        'contato', 'email','deficiente','nome_deficiencia',
        //Dependentes
        'dependente_nome','dependente_data_nascimento','dependente_cpf',
        'dependente2_nome','dependente2_data_nascimento','dependente2_cpf',

        'horario_visitacao_id',
        
        'qr_code','estado','visitou'
    ];

    public function search($filter = null){
        $results = $this->where('espaco_id', 'LIKE', "%{$filter}%")
                        // ->latest()
                        ->paginate();
        return $results;
    }
}