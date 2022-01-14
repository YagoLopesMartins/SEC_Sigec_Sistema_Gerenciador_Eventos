<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAgendamentoVisitacao;
use App\Models\AgendamentoVisitacao;
use App\Models\HorariosVisitacao;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendamentoVisitacaoController extends Controller
{
    private $repository, $horarios_visitacao;

    public function __construct(
                AgendamentoVisitacao $agendamentoVisitacao, 
                HorariosVisitacao $horarios_visitacao)
    {
        $this->repository = $agendamentoVisitacao;
        $this->horarios_visitacao = $horarios_visitacao;
    }
    public function index()
    {
        $horarios_visitacao = DB::table("horarios_visitacaos")
        ->where("horario_visitacao_numero_vagas", ">", 0)
        ->get();
       // $lista_horarios = $this->repository->all();
       // $horarios_visitacao = $this->horarios_visitacao->all();
            return view('site.pages.visitacao.index', 
                 compact('horarios_visitacao'));    
    }

    // public function limpa_cpf($cpf){
    //         $cpf_limpo = trim($cpf); // remove espaços
    //         $cpf_limpo = str_replace(".","", $cpf); // remove ponto
    //         $cpf_limpo = str_replace(",","", $cpf);
    //         $cpf_limpo = str_replace("-","", $cpf);
    //         $cpf_limpo = str_replace("/","", $cpf);
    //     return $cpf_limpo;
    // }
    // public function store(Request $request)
    public function store(StoreUpdateAgendamentoVisitacao $request)
    {
        $n = 1;
        if($request->dependente_nome){
            $n++;
        }
        if($request->dependente2_nome){
            $n++;
        }
        $data = [];
        $data = $request->all();
        $nome               = $data["nome_completo"];
        $horario_id         = $data["horario_visitacao_id"];
        //dd($data);
    /*
        $naturalidade       = $data["naturalidade"];
        $cpf                = $data["cpf"];
        $passaporte         = $data["passaporte"];
        $data_nascimento    = $data["data_nascimento"];
        $contato            = $data["contato"];
        $email              = $data["email"];
        $deficiente         = $data["deficiente"];
        $nome_deficiencia   = $data["nome_deficiencia"];
        $dependente_nome    = $data["dependente_nome"];
        $dependente_data_nascimento = $data["dependente_data_nascimento"];
        $dependente_cpf     = $data["dependente_cpf"];
        $dependente2_nome   = $data["dependente2_nome"];
        $dependente2_data_nascimento = $data["dependente2_data_nascimento"];
        $dependente2_cpf    = $data["dependente2_cpf"];     
    */
        // limpa CPF para ler melhor base para QR-CODE
            $cpf_01 = trim($data["cpf"]); // remove espaços
            $cpf_02 = str_replace(".","", $cpf_01); // remove ponto
            $cpf_03 = str_replace(",","", $cpf_02);
            $cpf_04 = str_replace("-","", $cpf_03);
            $cpf_limpo = str_replace("/","", $cpf_04);
        
        // Verifica se já existe o cadastro
        $agendamento_existente = DB::table('agendamento_visitacaos')
                ->where('naturalidade',                 '=', $data["naturalidade"])
                ->where('cpf',                          '=', $cpf_limpo)
                ->where('nome_completo',                '=', $data["nome_completo"])
                ->where('data_nascimento',              '=', $data["data_nascimento"])
                ->where('contato',                      '=', $data["contato"])
                ->where('email',                        '=', $data["email"])
                ->where('deficiente',                   '=', $data["deficiente"])
                ->where('nome_deficiencia',             '=', $data["nome_deficiencia"])
                ->where('dependente_nome',              '=', $data["dependente_nome"])
                ->where('dependente_data_nascimento',   '=', $data["dependente_data_nascimento"])
                ->where('dependente_cpf',               '=', $data["dependente_cpf"])
                ->where('dependente2_nome',             '=', $data["dependente2_nome"])
                ->where('dependente2_data_nascimento',  '=', $data["dependente2_data_nascimento"])
                ->where('dependente2_cpf',              '=', $data["dependente2_cpf"])
                ->where('horario_visitacao_id',         '=', $data["horario_visitacao_id"])
                ->first();

        if($agendamento_existente){
            return view('site.pages.visitacao.possuiCadastro');
        }else{
            $code = $horario_id.$cpf_limpo.$nome;

            $data["cpf"] = $cpf_limpo;
             // cadastro
            $visitante_cadastrato = $this->repository->create($data);

             // diminuir no banco coluna vagas
             $row = HorariosVisitacao::where('id', $horario_id)->first();
             HorariosVisitacao::where('id', $horario_id)->update([
                 'horario_visitacao_numero_vagas' 
                     => $row->horario_visitacao_numero_vagas - $n
             ]);

            // gerar qr-code
            return view('site.pages.visitacao.qrcode', 
                compact('visitante_cadastrato', 'code', 'row'));
        }
    }

    public function listagem(){
        $visitantes = $this->repository->all();
        $horarios = $this->horarios_visitacao->all();

        return view('site.pages.visitacao.listagem',
            compact('visitantes', 'horarios'));
    }

    public function listagemInscritos($id){

        // verifica se horario existe
        // $horario = $this->horarios_visitacao->where('id', $id)->first();
        // if (!$horario){
        //     return redirect()->back();
        // }
        // busca na tabela visitantes cujo campo horario_visitacao_id seja igual id do horario
        $visitantes_inscritos_horario = 
                DB::table("agendamento_visitacaos")
                ->join("horarios_visitacaos", function($join){
                    $join->on("agendamento_visitacaos.horario_visitacao_id", "=", "horarios_visitacaos.id");
                })
                ->where("agendamento_visitacaos.horario_visitacao_id", "=", $id)
                ->get();
        
        $horario = $this->horarios_visitacao->where('id', $id)->first();
        //dd($horario);

        return view('site.pages.visitacao.listagemInscritos',
            compact('visitantes_inscritos_horario', 'horario'));
    }
    public function listagemPDF($id){

        $visitantes_inscritos_horario = 
                DB::table("agendamento_visitacaos")
                ->join("horarios_visitacaos", function($join){
                    $join->on("agendamento_visitacaos.horario_visitacao_id", "=", "horarios_visitacaos.id");
                })
                ->where("agendamento_visitacaos.horario_visitacao_id", "=", $id)
                ->get();
        
        $horario = $this->horarios_visitacao->where('id', $id)->first();

        $texto_arquivo_pdf = $horario->horario_visitacao_data.'-'.$horario->horario_visitacao_hora_inicio;

        return PDF::loadView('site.pages.visitacao.listagemPDF', 
            compact('visitantes_inscritos_horario', 'horario'))
             // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
             //->setPaper('a4', 'landscape')
            //  ->download('DATA-HORA.pdf');
             ->download($texto_arquivo_pdf.'.pdf');
    }
}
