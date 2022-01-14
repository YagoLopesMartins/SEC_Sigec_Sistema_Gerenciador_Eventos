<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    protected $table = 'visitantes_espacos';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = true;

    protected $fillable = [
        'naturalidade', 'cpf','passaporte','nome_completo','data_nascimento',
        'contato', 'email','deficiente','nome_deficiencia','espaco_id','dia_visita','hora_visita',
        'qr-code','estado'
    ];
}
