<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSubCategoria;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoriaController extends Controller
{
    private $repository, $categoria;

    public function __construct(SubCategoria $subcategoria, Categoria $categoria) {

        $this->repository = $subcategoria;
        $this->categoria = $categoria;
        // $this->middleware(['can:plans']);
    }

    public function index() {

        $subcategorias = $this->repository
                ->where('subcategoria_estado','=','Ativo')
                ->latest()
                ->paginate(3);
        // $plans = $this->repository->paginate(1);
        return view('admin.pages.subcategorias.index', [
            'subcategorias' => $subcategorias,
        ]);
    }

    public function create() {
        $categorias = $this->categoria->all();

        return view('admin.pages.subcategorias.create', [
            'categorias' => $categorias
        ]);
    }

    public function store(StoreUpdateSubCategoria $request)
    {
        // dd($request); // use Illuminate\Support\Str; 
        // $data = $request->all(); 
        // $data['categoria_id'] = Str::kebab($request->categoria_id);
       $this->repository->create($request->all());
       // $this->repository->create($data);
        return redirect('subcategorias')
                ->withSuccess('Subcategoria cadastrada com sucesso!');
        // if($this->repository->create($request->all())){
        //     $request->session()->flash('success', 'subcategoria cadastrada com Sucesso!');
        //     return redirect()->route('subcategorias.index');
        // }
    }
    public function show($id)
    {
        $subcategorias = $this->repository->where('subcategoria_id', $id)->first();

        if (!$subcategorias)
            return redirect()->back();

        return view('admin.pages.subcategorias.show', [
            'subcategorias' => $subcategorias
        ]);
    }

    public function edit($id)
    {
        $categorias = $this->categoria->all();
        $subcategorias = $this->repository->where('subcategoria_id', $id)->first();

        if (!$subcategorias)
            return redirect()->back();

        return view('admin.pages.subcategorias.edit', [
            'subcategorias' => $subcategorias,
            'categorias' => $categorias
        ]);
    }

    public function update(StoreUpdateSubCategoria $request, $id)
    {
        $subcategoria = $this->repository->where('subcategoria_id', $id)->first();

        if (!$subcategoria)
            return redirect()->back();

        $subcategoria->update($request->all());

        return redirect('subcategorias')
                 ->withSuccess('Subcategoria atualizada com sucesso!');
    }
    
    public function destroy($id)
    {
        $subcategoria = $this->repository
                        // ->with('details')
                        ->where('subcategoria_id', $id)
                        ->first();

        if (!$subcategoria)
            return redirect()->back();
        
        $subcategoria->subcategoria_estado = 'Inativo';
        $subcategoria->update();

        return redirect('subcategorias');
    }
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $subcategorias = $this->repository->search($request->filter);

        return view('admin.pages.subcategorias.index', [
            'subcategorias' => $subcategorias,
            'filters' => $filters,
        ]);
    }
}
