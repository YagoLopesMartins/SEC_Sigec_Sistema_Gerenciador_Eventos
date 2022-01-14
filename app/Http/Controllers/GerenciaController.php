<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateGerencia;
use App\Models\Diretoria;
use App\Models\Gerencia;
use Illuminate\Http\Request;

class GerenciaController extends Controller
{
    private $repository, $diretoria;

    public function __construct(Gerencia $gerencia, Diretoria $diretoria) {

        $this->repository = $gerencia;
        $this->diretoria = $diretoria;
        // $this->middleware(['can:plans']);
    }

    public function index() {

        $gerencias = $this->repository
                ->where('gerencia_estado','=','Ativo')
                ->latest()
                ->paginate(3);
        // $plans = $this->repository->paginate(1);
        return view('admin.pages.gerencias.index', [
            'gerencias' => $gerencias,
        ]);
    }

    public function create() {
        $diretorias = $this->diretoria->all();

        return view('admin.pages.gerencias.create', [
            'diretorias' => $diretorias
        ]);
    }

    public function store(StoreUpdateGerencia $request)
    {
        // dd($request); // use Illuminate\Support\Str; 
        // $data = $request->all(); 
        // $data['categoria_id'] = Str::kebab($request->categoria_id);
       $this->repository->create($request->all());
       // $this->repository->create($data);
        return redirect('gerencias')
                ->withSuccess('Gerência cadastrada com sucesso!');
        // if($this->repository->create($request->all())){
        //     $request->session()->flash('success', 'subcategoria cadastrada com Sucesso!');
        //     return redirect()->route('gerencias.index');
        // }
    }
    public function show($id)
    {
        $gerencias = $this->repository->where('gerencia_id', $id)->first();

        if (!$gerencias)
            return redirect()->back();

        return view('admin.pages.gerencias.show', [
            'gerencias' => $gerencias
        ]);
    }

    public function edit($id)
    {
        $diretorias = $this->diretoria->all();
        $gerencias = $this->repository->where('gerencia_id', $id)->first();

        if (!$gerencias)
            return redirect()->back();

        return view('admin.pages.gerencias.edit', [
            'gerencias' => $gerencias,
            'diretorias' => $diretorias
        ]);
    }

    public function update(StoreUpdateGerencia $request, $id)
    {
        $gerencia = $this->repository->where('gerencia_id', $id)->first();

        if (!$gerencia)
            return redirect()->back();

        $gerencia->update($request->all());

        return redirect('gerencias')
                 ->withSuccess('Gerência atualizada com sucesso!');
    }
    
    public function destroy($id)
    {
        $gerencia = $this->repository
                        // ->with('details')
                        ->where('gerencia_id', $id)
                        ->first();

        if (!$gerencia)
            return redirect()->back();
        
        $gerencia->gerencia_estado = 'Inativo';
        $gerencia->update();

        return redirect('gerencias');
    }
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $gerencias = $this->repository->search($request->filter);

        return view('admin.pages.gerencias.index', [
            'gerencias' => $gerencias,
            'filters' => $filters,
        ]);
    }
}
