<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateOrgao;
use App\Models\Orgao;
use Illuminate\Http\Request;

class OrgaoController extends Controller
{
    private $repository;

    public function __construct(Orgao $orgao) {
        $this->repository = $orgao;
        // $this->middleware(['can:plans']);
    }

    public function index() {

        $orgaos = $this->repository
                ->where('orgao_estado','=','Ativo')
                ->latest()
                ->paginate(2);
        // $plans = $this->repository->paginate(1);
        return view('admin.pages.orgaos.index', [
            'orgaos' => $orgaos,
        ]);
    }

    public function create() {
        return view('admin.pages.orgaos.create');
    }

    public function store(StoreUpdateOrgao $request)
    {
        //  dd($request); use Illuminate\Support\Str; $data = $request->all(); $data['url'] = Str::kebab($request->name);
        $this->repository->create($request->all());
        return redirect('orgaos')
        ->withSuccess('Orgao cadastrada com sucesso');
        // if($this->repository->create($request->all())){
        //     $request->session()->flash('success', 'Orgao cadastrada com Sucesso!');
        //     return redirect()->route('orgaos.index');
        // }
    }
    public function show($id)
    {
        $orgaos = $this->repository->where('orgao_id', $id)->first();

        if (!$orgaos)
            return redirect()->back();

        return view('admin.pages.orgaos.show', [
            'orgaos' => $orgaos
        ]);
    }

    public function edit($id)
    {
        $orgaos = $this->repository->where('orgao_id', $id)->first();

        if (!$orgaos)
            return redirect()->back();

        return view('admin.pages.orgaos.edit', [
            'orgaos' => $orgaos
        ]);
    }

    public function update(StoreUpdateOrgao $request, $id)
    {
        $orgao = $this->repository->where('orgao_id', $id)->first();

        if (!$orgao)
            return redirect()->back();

        $orgao->update($request->all());

        return redirect('orgaos');
    }
    
    public function destroy($id)
    {
        $orgao = $this->repository
                        // ->with('details')
                        ->where('orgao_id', $id)
                        ->first();

        if (!$orgao)
            return redirect()->back();
        
        $orgao->orgao_estado = 'Inativo';
        $orgao->update();

        return redirect('orgaos');
    }
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $orgaos = $this->repository->search($request->filter);

        return view('admin.pages.orgaos.index', [
            'orgaos' => $orgaos,
            'filters' => $filters,
        ]);
    }
}
