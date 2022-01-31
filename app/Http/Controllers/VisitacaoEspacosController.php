<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVisitacaoEspacoHorarios;
use App\Models\Espaco;
use App\Models\Event;
use App\Models\VisitacaoEspacos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class VisitacaoEspacosController extends Controller
{
    protected $repository, $espaco, $event, $horarios_visitacao_espacos;

    public function __construct(Espaco $espaco, Event $event, 
                 VisitacaoEspacos $horarios_visitacao_espacos){
         $this->espaco = $espaco;
         $this->event = $event;
         $this->horarios_visitacao_espacos = $horarios_visitacao_espacos;
     }

    public function index(Request $request){

       //  $events = $this->event->all();

        // $horario_visitacao_espacos = $this->horario_visitacao_espacos->all();
        $formularioCreate = true;

        $horarios_visitacao_espacos = DB::table('horarios_visitacao_espacos')->get();
        $espacos = DB::table('espacos')->get();

        // $horarios_visitacao_espacos = DB::table('horarios_visitacao_espacos')
        //         ->where('horario_visitacao_espacos_numero_vagas', '>', 0)
        //         ->get();

        return view('site.pages.visitacaoEspacos.index', 
            compact('horarios_visitacao_espacos',  'formularioCreate', 'espacos' ));
                // compact('espacos', 'horarios_visitacao_espacos', 'formularioCreate' ));
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

     public function store(StoreUpdateVisitacaoEspacoHorarios $request)
     {
        // dd($request);
       //  $data = $request->all();
        // $data['horario_visitacao_espacos_data'] = Carbon::parse($data['horario_visitacao_espacos_data'])->format('d/m/Y');
         $this->horarios_visitacao_espacos->create($request->all());
        //  $this->horarios_visitacao_espacos->create($data);

        return redirect('visitacaoEspacos')
                 ->withSuccess('Horário de visitação ao espaço cadastrado com sucesso!');
     }

     public function qrcode($id){
         if(!$horario_visitacao_espacos_lista = $this->horario_visitacao_espacos->where('id', $id)->first()){
             return redirect()->back();
         }
        // dd($horario_visitacao_espacos_lista);
         $uri = "qrcode";
        
         return view('site.pages.visitacaoEspacos.qrcode', compact('uri', 'horario_visitacao_espacos_lista'));
     }

     public function visitante(){
         return view('site.pages.visitacaoEspacos.formVisitante');
     }
}
