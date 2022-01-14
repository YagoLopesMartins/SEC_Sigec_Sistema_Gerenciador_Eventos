<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVisitacaoEspacoHorarios;
use App\Models\Espaco;
use App\Models\Event;
use App\Models\VisitacaoEspacos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class VisitacaoEspacosController extends Controller
{
    protected $repository, $espaco, $event, $horario_visitacao_espacos;

    public function __construct(Espaco $espaco, Event $event, VisitacaoEspacos $horario_visitacao_espacos){
        $this->espaco = $espaco;
        $this->event = $event;
        $this->horario_visitacao_espacos = $horario_visitacao_espacos;
    }

    public function index(Request $request){

        $espacos = $this->espaco->all();
        $events = $this->event->all();

        $horario_visitacao_espacos = $this->horario_visitacao_espacos->all();
        $formularioCreate = true;

        if($request->ajax()) {
       
            $data = Event::whereDate('start', '>=', $request->start)
                         ->whereDate('end',   '<=', $request->end)
                         ->get(['id', 'title', 'start', 'end']);
 
            return response()->json($data);
        }

        return view('site.pages.visitacaoEspacos.index', compact('espacos', 'formularioCreate', 'events', 'horario_visitacao_espacos'));
    }
    public function ajax(Request $request)
    {
        switch ($request->type) {
           case 'add':
              $event = Event::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Event::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }

    public function search(Request $request)
    {

        // $segmenteRoute = $this->segment(3);
        // dd($segmenteRoute);

        $espacos = $this->espaco->all();
        $filters = $request->except('_token');
        // $filters = $request->only('filter');

        $horario_visitacao_espacos_lista = $this->horario_visitacao_espacos->search($request->filter);

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
        $data = $request->all();
        $data['horario_visitacao_espacos_data'] = Carbon::parse($data['horario_visitacao_espacos_data'])->format('d/m/Y');
        $this->horario_visitacao_espacos->create($data);

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
