<?php

namespace App\Http\Controllers;

use App\Models\Espaco;
use App\Models\Event;
use Illuminate\Http\Request;

class FullCalenderController extends Controller
{
    public function __construct(Espaco $espaco, Event $event){
        $this->espaco = $espaco;
        $this->event = $event;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $espacos = $this->espaco->all();
        $events = $this->event->all();
        $formularioCreate = true;
  
        if($request->ajax()) {
             $data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
             return response()->json($data);
        }
        return view('site.pages.visitacaoEspacos.fullcalender', compact('espacos', 'formularioCreate', 'events'));
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
