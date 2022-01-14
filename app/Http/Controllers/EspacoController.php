<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEspaco;
use App\Models\Espaco;
use Illuminate\Http\Request;

class EspacoController extends Controller
{
    private $repository;

    public function __construct(Espaco $espaco) {
        $this->repository = $espaco;
        // $this->middleware(['can:plans']);
    }

    public function index() {

        $espacos = $this->repository
                ->where('espaco_estado','=','Ativo')
                ->latest()
                ->paginate();
        // $plans = $this->repository->paginate(1);
        return view('admin.pages.espacos.index', [
            'espacos' => $espacos,
        ]);
    }

    public function create() {
        return view('admin.pages.espacos.create');
    }

    public function store(StoreUpdateEspaco $request)
    {
        //  dd($request); use Illuminate\Support\Str; $data = $request->all(); $data['url'] = Str::kebab($request->name);
        $this->repository->create($request->all());
        return redirect('espacos')
        ->withSuccess('Espaco cadastrado com sucesso');
        // if($this->repository->create($request->all())){
        //     $request->session()->flash('success', 'Espaco cadastrada com Sucesso!');
        //     return redirect()->route('espacos.index');
        // }
    }
    public function show($id)
    {
        $espacos = $this->repository->where('espaco_id', $id)->first();

        if (!$espacos)
            return redirect()->back();

        return view('admin.pages.espacos.show', [
            'espacos' => $espacos
        ]);
    }

    public function edit($id)
    {
        $espacos = $this->repository->where('espaco_id', $id)->first();

        if (!$espacos)
            return redirect()->back();

        return view('admin.pages.espacos.edit', [
            'espacos' => $espacos
        ]);
    }

    public function update(StoreUpdateEspaco $request, $id)
    {
        $espaco = $this->repository->where('espaco_id', $id)->first();

        if (!$espaco)
            return redirect()->back();

        $espaco->update($request->all());

        return redirect('espacos');
    }
    
    public function destroy($id)
    {
        $espaco = $this->repository
                        // ->with('details')
                        ->where('espaco_id', $id)
                        ->first();

        if (!$espaco)
            return redirect()->back();
        
        $espaco->espaco_estado = 'Inativo';
        $espaco->update();

        return redirect('espacos'); 
    }
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $espacos = $this->repository->search($request->filter);

        return view('admin.pages.espacos.index', [
            'espacos' => $espacos,
            'filters' => $filters,
        ]);
    }
}
