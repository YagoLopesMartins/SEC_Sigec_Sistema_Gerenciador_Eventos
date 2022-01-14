<?php

namespace App\Http\Controllers;

use App\Models\ResponsavelEspaco;
use Illuminate\Http\Request;

class ResponsavelEspacoController extends Controller
{
    private $repository;

    public function __construct(ResponsavelEspaco $responsavelEspaco) {
        $this->repository = $responsavelEspaco;
        // $this->middleware(['can:plans']);
    }

    public function index() {

        $responsavelEspacos = $this->repository
                ->where('responsavelEspaco_estado','=','Ativo')
                ->latest()
                ->paginate(2);
        // $plans = $this->repository->paginate(1);
        return view('admin.pages.responsavelEspaco.index', [
            'responsavelEspacos' => $responsavelEspacos,
        ]);
    }

    public function create() {
        return view('admin.pages.responsavelEspacos.create');
    }

    public function store(StoreUpdateResponsavelEspaco $request)
    {
        //  dd($request); use Illuminate\Support\Str; $data = $request->all(); $data['url'] = Str::kebab($request->name);
        $this->repository->create($request->all());
        return redirect('responsavelEspaco')
        ->withSuccess('ResponsavelEspaco cadastrada com sucesso');
        // if($this->repository->create($request->all())){
        //     $request->session()->flash('success', 'ResponsavelEspaco cadastrada com Sucesso!');
        //     return redirect()->route('responsavelEspacos.index');
        // }
    }
    public function show($id)
    {
        $responsavelEspacos = $this->repository->where('responsavelEspaco_id', $id)->first();

        if (!$responsavelEspacos)
            return redirect()->back();

        return view('admin.pages.responsavelEspaco.show', [
            'responsavelEspacos' => $responsavelEspacos
        ]);
    }

    public function edit($id)
    {
        $responsavelEspacos = $this->repository->where('responsavelEspaco_id', $id)->first();

        if (!$responsavelEspacos)
            return redirect()->back();

        return view('admin.pages.responsavelEspaco.edit', [
            'responsavelEspacos' => $responsavelEspacos
        ]);
    }

    public function update(StoreUpdateResponsavelEspaco $request, $id)
    {
        $responsavelEspaco = $this->repository->where('responsavelEspaco_id', $id)->first();

        if (!$responsavelEspaco)
            return redirect()->back();

        $responsavelEspaco->update($request->all());

        return redirect('responsavelEspaco');
    }
    
    public function destroy($id)
    {
        $responsavelEspaco = $this->repository
                        // ->with('details')
                        ->where('responsavelEspaco_id', $id)
                        ->first();

        if (!$responsavelEspaco)
            return redirect()->back();
        
        $responsavelEspaco->responsavelEspaco_estado = 'Inativo';
        $responsavelEspaco->update();

        return redirect('responsavelEspaco');
    }
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $responsavelEspacos = $this->repository->search($request->filter);

        return view('admin.pages.responsavelEspaco.index', [
            'responsavelEspacos' => $responsavelEspacos,
            'filters' => $filters,
        ]);
    }
}
