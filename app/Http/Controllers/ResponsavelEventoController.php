<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateResponsavelEvento;
use App\Models\ResponsavelEvento;
use Illuminate\Http\Request;

class ResponsavelEventoController extends Controller
{
    private $repository;

    public function __construct(ResponsavelEvento $responsavelEvento) {
        $this->repository = $responsavelEvento;
        // $this->middleware(['can:plans']);
    }

    public function index() {

        $responsavelEventos = $this->repository
                ->where('responsavel_evento_estado','=','Ativo')
                ->latest()
                ->paginate(2);
        // $plans = $this->repository->paginate(1);
        return view('admin.pages.responsavelEventos.index', [
            'responsavelEventos' => $responsavelEventos,
        ]);
    }

    public function create() {
        return view('admin.pages.responsavelEventos.create');
    }

    public function store(StoreUpdateResponsavelEvento $request)
    {
        //  dd($request); use Illuminate\Support\Str; $data = $request->all(); $data['url'] = Str::kebab($request->name);
        $this->repository->create($request->all());
        return redirect('responsavelEventos')
        ->withSuccess('ResponsavelEspaco cadastrada com sucesso');
        // if($this->repository->create($request->all())){
        //     $request->session()->flash('success', 'ResponsavelEspaco cadastrada com Sucesso!');
        //     return redirect()->route('responsavelEventos.index');
        // }
    }
    public function show($id)
    {
        $responsavelEventos = $this->repository->where('responsavel_evento_id', $id)->first();

        if (!$responsavelEventos)
            return redirect()->back();

        return view('admin.pages.responsavelEventos.show', [
            'responsavelEventos' => $responsavelEventos
        ]);
    }

    public function edit($id)
    {
        $responsavelEventos = $this->repository->where('responsavel_evento_id', $id)->first();

        if (!$responsavelEventos)
            return redirect()->back();

        return view('admin.pages.responsavelEventos.edit', [
            'responsavelEventos' => $responsavelEventos
        ]);
    }

    public function update(StoreUpdateResponsavelEvento $request, $id)
    {
        $responsavelEvento = $this->repository->where('responsavel_evento_id', $id)->first();

        if (!$responsavelEvento)
            return redirect()->back();

        $responsavelEvento->update($request->all());

        return redirect('responsavelEventos');
    }
    
    public function destroy($id)
    {
        $responsavelEvento = $this->repository
                        // ->with('details')
                        ->where('responsavel_evento_id', $id)
                        ->first();

        if (!$responsavelEvento)
            return redirect()->back();
        
        $responsavelEvento->responsavel_evento_estado = 'Inativo';
        $responsavelEvento->update();

        return redirect('responsavelEventos');
    }
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $responsavelEventos = $this->repository->search($request->filter);

        return view('admin.pages.responsavelEventos.index', [
            'responsavelEventos' => $responsavelEventos,
            'filters' => $filters,
        ]);
    }
}
