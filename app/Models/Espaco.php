<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espaco extends Model
{
    protected $table = 'espacos';
    protected $primaryKey = 'espaco_id';
    protected $guarded = [];

    public $timestamps = true;
    protected $fillable = ['espaco_nome','espaco_hora_funcionamento_inicio', 'espaco_hora_funcionamento_fim',
    'espaco_endereco','espaco_informacoes','espaco_latidude','espaco_longitude','espaco_telefone','espaco_email','espaco_estado',
    'espaco_disponivel_visitacao',
    'espaco_horario_segunda','espaco_horario_terca','espaco_horario_quarta','espaco_horario_quinta',
    'espaco_horario_sexta','espaco_horario_sabado','espaco_horario_domingo',
    'espaco_grupo_id','espaco_responsavel_id'];

    public function search($filter = null){
        $results = $this->where('espaco_nome', 'LIKE', "%{$filter}%")
                        ->orWhere('espaco_endereco', 'LIKE', "%{$filter}%")
                        ->orWhere('espaco_email', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }
}
