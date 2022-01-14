<?php

namespace App\Http\Controllers;

use App\Models\Espaco;
use App\Models\Event;
use App\Models\Pauta;
use Illuminate\Http\Request;

class ProgramacaoEventosController extends Controller
{

    protected $repository, $espaco, $event;

    public function __construct(Pauta $pautas, Espaco $espaco, Event $event){
        $this->espaco = $espaco;
        $this->event = $event;
        $this->repository = $pautas;
    }

    public function index(Request $request) {

        $espacos = $this->espaco->all();
        $events = $this->event->all();
        $formularioCreate = true;

         if($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                         ->whereDate('end',   '<=', $request->end)
                         ->get(['id', 'title', 'start', 'end']);
 
            return response()->json($data);
        }

        $pautas = $this->repository
                ->where('pauta_status','=','Aprovado')
                ->latest()
                ->paginate();

        // dd($pautas);
        // $plans = $this->repository->paginate(1);
        return view('site.pages.programacaoEventos.index', compact('pautas', 'espacos', 'formularioCreate', 'events'));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */

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
}
