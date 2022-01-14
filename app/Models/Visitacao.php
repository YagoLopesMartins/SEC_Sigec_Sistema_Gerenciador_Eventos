<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitacao extends Model
{
    protected $table = 'visitantes_espacos';
    protected $primaryKey = 'visitante_espaco_id';
    protected $guarded = [];

    public $timestamps = true;

    protected $fillable = [
        // Visitante
        'naturalidade', 'cpf','passaporte','nome_completo','data_nascimento',
        'contato', 'email','deficiente','nome_deficiencia',
        //Dependentes
        'dependente_nome','dependente_data_nascimento','dependente_cpf',
        'dependente2_nome','dependente2_data_nascimento','dependente2_cpf',

        'espaco_id',
        
        'dia_visita','hora_visita',
        'qr-code','estado',

        'visitou'
    ];
}
