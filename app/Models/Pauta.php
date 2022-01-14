<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pauta extends Model
{
    protected $table = 'pautas';
    protected $primaryKey = 'pauta_id';
    protected $guarded = [];

    public $timestamps = true;

    // Categorias
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id'); 
    }
    // SubCategorias
    public function subcategoria(){
        return $this->belongsTo(SubCategoria::class, 'subcategoria_id'); 
    }
    // Orgaos
     public function orgao(){
        return $this->belongsTo(Orgao::class, 'orgao_id'); 
    }
    // Diretoria
    public function diretoria(){
        return $this->belongsTo(Diretoria::class, 'diretoria_id'); 
    }
    // Gerencias
    public function gerencia(){
        return $this->belongsTo(Gerencia::class, 'gerencia_id'); 
    }
    // Responsavel interno
    public function responsavelInterno(){
        return $this->belongsTo(Usuario::class, 'usuario_id'); 
    }
    // Responsavel evento
    public function responsavelEvento(){
        return $this->belongsTo(ResponsavelEvento::class, 'responsavel_evento_id'); 
    }
    // Espacos
    public function espaco(){
        return $this->belongsTo(Espaco::class, 'espaco_id'); 
    }
    // Classificacao Indicativa
    public function classificaoIndicativa(){
        return $this->belongsTo(ClassificacaoIndicativa::class, 'classificao_indicativa_id'); 
    }

    protected $fillable = [
        'tipo_pauta', 'link_transmissao_online','categoria_id',
            'subcategoria_id','possui_venda_ingresso','link_venda_ingresso', 
        'secretaria_orgao','diretoria_id', 'gerencia_id', 'numero_documento_fisico', 
            'titulo', 'descricao', 'responsavel_interno_id', 'responsavel_evento_id',
            'observacoes','resumo_da_analise', 
        'espaco_id','agenda_data_inicio','agenda_hora_inicio','agenda_data_fim',
            'agenda_hora_fim',
        'classificacao_indicativa_id',
        'imagem_titulo','imagem_descricao','imagem_arquivo','imagem_liberar_para_publicacao',
        'pauta_analise',
        'anexos_arquivo',
        'espaco_id','incricoes_numero_vagas','incricoes_data_inicio',
            'incricoes_hora_inicio','incricoes_data_fim','incricoes_hora_fim',
            'incricoes_limite_dependentes','incricoes_observacoes',
        'pauta_estado',
        'usuario_criacao_id',
        'pauta_status'
    ];

    public function search($filter = null){
        $results = $this->where('titulo', 'LIKE', "%{$filter}%")
                        ->orWhere('pauta_id', 'LIKE', "%{$filter}%")
                        ->orWhere('pauta_status', 'LIKE', "%{$filter}%")
                        ->orWhere('numero_documento_fisico', 'LIKE', "%{$filter}%")
                        
                        // ->latest()
                        ->paginate();
        return $results;
    }
}
