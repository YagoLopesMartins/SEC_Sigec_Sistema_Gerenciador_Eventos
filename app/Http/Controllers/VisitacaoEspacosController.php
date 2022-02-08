<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\StoreUpdateVisitacaoEspacoHorarios;
use App\Models\Espaco;
use App\Models\Event;
use App\Models\VisitacaoEspacos;
use App\Models\HorariosVisitacao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class VisitacaoEspacosController extends Controller
{
    protected $espaco, $event, 
              $horarios_visitacao_espacos, $horarios_visitacao;

    public function __construct(Espaco $espaco, Event $event, 
                                VisitacaoEspacos $horarios_visitacao_espacos, 
                                HorariosVisitacao $horarios_visitacao){
         $this->espaco = $espaco;
         $this->event = $event;
         $this->horarios_visitacao_espacos = $horarios_visitacao_espacos;
         $this->horarios_visitacao = $horarios_visitacao;
     }

     public function index(Request $request){

        $horarios = $this->horarios_visitacao->all();

       //  $events = $this->event->all();

        // $horario_visitacao_espacos = $this->horario_visitacao_espacos->all();
        // $formularioCreate = true;

        $horarios_visitacao_espacos = DB::table('horarios_visitacao_espacos')->get();
        $espacos = DB::table('espacos')->get();

        // $horarios_visitacao_espacos = DB::table('horarios_visitacao_espacos')
        //         ->where('horario_visitacao_espacos_numero_vagas', '>', 0)
        //         ->get();

        return view('site.pages.visitacaoEspacos.index', 
            compact('horarios_visitacao_espacos', 'espacos' , 'horarios'));
          
    }

     public function store(Request $request)
     {
        $data = $request->all();

        $espaco_nome_row =  $this->espaco
            ->select('espaco_nome')
            ->where('espaco_id', $data['espaco_id'])
            ->first();
       
        $slug_espaco = Str::slug($espaco_nome_row->espaco_nome, '-');
        
        $data['horario_visitacao_data'] = Carbon::parse($data['horario_visitacao_data'])->format('d/m/Y');
        //  $this->horarios_visitacao_espacos->create($request->all());
         $this->horarios_visitacao_espacos->create($data);

        return redirect('visitacaoEspacos')
                 ->withSuccess('Horário de visitação ao espaço cadastrado com sucesso!');
     }

    public function index2(Request $request){

        //  $events = $this->event->all();
 
         // $horario_visitacao_espacos = $this->horario_visitacao_espacos->all();
         $formularioCreate = true;
 
         $espacos = DB::table('horarios_visitacao_espacos')
                 ->where('espaco_id','<>','NULL')
                 ->groupBy('espaco_id')
                 ->get();
 
         // $horarios_visitacao_espacos = DB::table('horarios_visitacao_espacos')
         //         ->where('horario_visitacao_espacos_numero_vagas', '>', 0)
         //         ->get();
 
         return view('site.pages.visitacaoEspacos.index2', 
             compact('espacos',  'formularioCreate' ));
                 // compact('espacos', 'horarios_visitacao_espacos', 'formularioCreate' ));
     }

    function fetch(Request $request){

        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = DB::table('horarios_visitacao_espacos')
        ->where($select, $value)
        ->where('horario_visitacao_espacos_numero_vagas', '>', 0)
        ->get();

        $output = '<option value="">
                    Selecione um '.ucfirst($dependent).
                '</option>';

        foreach($data as $row){
            $output .= '<option value="'.
                $row->$dependent.'">
                '.$row->$dependent.'</option>';
        }

        echo $output; 
    }
    
    public function search(Request $request)
     {

         // $segmenteRoute = $this->segment(3);
         // dd($segmenteRoute);

         $espacos = $this->espaco->all();
         $filters = $request->except('_token');
         // $filters = $request->only('filter');

         $horario_visitacao_espacos_lista = $this->horarios_visitacao_espacos->search($request->filter);

         return view('site.pages.visitacaoEspacos.index', [
             'horario_visitacao_espacos' => $horario_visitacao_espacos_lista,
             'filters' => $filters,
             'espacos' => $espacos
         ]);
     }

     public function destroy($id)
     {
         $horarios_visitacao_espaco = $this->horario_visitacao_espacos
                         // ->with('details')
                         ->where('id', $id)
                         ->first();

         if (!$horarios_visitacao_espaco)
             return redirect()->back();
   
        
         $horarios_visitacao_espaco->delete();

         return redirect('visitacaoEspacos');
     }

     public function create() {
         $horario_visitacao_espacos_lista = $this->horario_visitacao_espacos->all();

         return view('site.pages.visitacaoEspacos.create', [
             'horario_visitacao_espacos' => $horario_visitacao_espacos_lista
         ]);
     }

     public function qrcode($id){
         if(!$horario_visitacao_espacos_lista = $this->horario_visitacao_espacos->where('id', $id)->first()){
             return redirect()->back();
         }
         $uri = "qrcode";
         return view('site.pages.visitacaoEspacos.qrcode', compact('uri', 'horario_visitacao_espacos_lista'));
     }

     public function visitante(){
         return view('site.pages.visitacaoEspacos.formVisitante');
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
