<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsavelEspaco extends Model
{
    protected $table = 'responsavel_espaco';
    protected $primaryKey = 'responsavel_espaco_id';
    protected $guarded = [];

    public $timestamps = true;
    
    protected $fillable = [
        'responsavel_evento_nome','responsavel_evento_empresa', 'responsavel_evento_telefone',
        'responsavel_evento_telefone2','responsavel_evento_telefone3','responsavel_evento_estado','responsavel_evento_email'
    ];

    public function search($filter = null){
        $results = $this->where('responsavel_evento_nome', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }
}
