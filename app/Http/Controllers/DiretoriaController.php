<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateDiretoria;
use App\Models\Diretoria;
use App\Models\Orgao;
use Illuminate\Http\Request;

class DiretoriaController extends Controller
{
    private $repository, $orgao;

    public function __construct(Diretoria $diretoria, Orgao $orgao) {

        $this->repository = $diretoria;
        $this->orgao = $orgao;
        // $this->middleware(['can:plans']);
    }

    public function index() {

        $diretorias = $this->repository
                ->where('diretoria_estado','=','Ativo')
                ->latest()
                ->paginate(3);
        // $plans = $this->repository->paginate(1);
        return view('admin.pages.diretorias.index', [
            'diretorias' => $diretorias,
        ]);
    }

    public function create() {
        $orgaos = $this->orgao->all();

        return view('admin.pages.diretorias.create', [
            'orgaos' => $orgaos
        ]);
    }

    public function store(StoreUpdateDiretoria $request)
    {
        // dd($request); // use Illuminate\Support\Str; 
        // $data = $request->all(); 
        // $data['categoria_id'] = Str::kebab($request->categoria_id);
       $this->repository->create($request->all());
       // $this->repository->create($data);
        return redirect('diretorias')
                ->withSuccess('Diretoria cadastrada com sucesso!');
        // if($this->repository->create($request->all())){
        //     $request->session()->flash('success', 'subcategoria cadastrada com Sucesso!');
        //     return redirect()->route('diretorias.index');
        // }
    }
    public function show($id)
    {
        $diretorias = $this->repository->where('diretoria_id', $id)->first();

        if (!$diretorias)
            return redirect()->back();

        return view('admin.pages.diretorias.show', [
            'diretorias' => $diretorias
        ]);
    }

    public function edit($id)
    {
        $orgaos = $this->orgao->all();
        $diretorias = $this->repository->where('diretoria_id', $id)->first();

        if (!$diretorias)
            return redirect()->back();

        return view('admin.pages.diretorias.edit', [
            'diretorias' => $diretorias,
            'orgaos' => $orgaos
        ]);
    }

    public function update(StoreUpdateDiretoria $request, $id)
    {
        $diretoria = $this->repository->where('diretoria_id', $id)->first();

        if (!$diretoria)
            return redirect()->back();

        $diretoria->update($request->all());

        return redirect('diretorias')
                 ->withSuccess('Diretoria atualizada com sucesso!');
    }
    
    public function destroy($id)
    {
        $diretoria = $this->repository
                        // ->with('details')
                        ->where('diretoria_id', $id)
                        ->first();

        if (!$diretoria)
            return redirect()->back();
        
        $diretoria->diretoria_estado = 'Inativo';
        $diretoria->update();

        return redirect('diretorias');
    }
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $diretorias = $this->repository->search($request->filter);

        return view('admin.pages.diretorias.index', [
            'diretorias' => $diretorias,
            'filters' => $filters,
        ]);
    }
}
