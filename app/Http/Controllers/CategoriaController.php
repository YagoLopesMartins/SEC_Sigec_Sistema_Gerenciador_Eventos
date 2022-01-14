<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategoria;
use App\Models\Categoria;
use App\Notifications\NewContact;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Route;

class CategoriaController extends Controller
{
    private $repository;

    public function __construct(Categoria $categoria) {
        $this->repository = $categoria;
        // $this->middleware(['can:plans']);
    }

    public function index() {

        $categorias = $this->repository
                ->where('categoria_estado','=','Ativo')
                ->latest()
                ->paginate();
        // $plans = $this->repository->paginate(1);
        return view('admin.pages.categorias.index', [
            'categorias' => $categorias,
        ]);
    }

    public function create() {
        return view('admin.pages.categorias.create');
    }

    public function store(StoreUpdateCategoria $request)
    {
        //  dd($request); use Illuminate\Support\Str; $data = $request->all(); $data['url'] = Str::kebab($request->name);
        $this->repository->create($request->all());

        // Notification::route('mail', 'yagolopesmartins777@gmail.com')
        //     ->notify(new NewContact());

        return redirect('categorias')
            ->withSuccess('Categoria cadastrada com sucesso');
            // if($this->repository->create($request->all())){
            //     $request->session()->flash('success', 'Categoria cadastrada com Sucesso!');
            //     return redirect()->route('categorias.index');
            // }
    }
    public function show($id)
    {
        $categorias = $this->repository->where('categoria_id', $id)->first();

        if (!$categorias)
            return redirect()->back();

        return view('admin.pages.categorias.show', [
            'categorias' => $categorias
        ]);
    }

    public function edit($id)
    {
        $categorias = $this->repository->where('categoria_id', $id)->first();

        if (!$categorias)
            return redirect()->back();

        return view('admin.pages.categorias.edit', [
            'categorias' => $categorias
        ]);
    }

    public function update(StoreUpdateCategoria $request, $id)
    {
        $categoria = $this->repository->where('categoria_id', $id)->first();

        if (!$categoria)
            return redirect()->back();

        $categoria->update($request->all());

        return redirect('categorias');
    }
    
    public function destroy($id)
    {
        $categoria = $this->repository
                        // ->with('details')
                        ->where('categoria_id', $id)
                        ->first();

        if (!$categoria)
            return redirect()->back();
        
        $categoria->categoria_estado = 'Inativo';
        $categoria->update();

        return redirect('categorias');
    }
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $categorias = $this->repository->search($request->filter);

        return view('admin.pages.categorias.index', [
            'categorias' => $categorias,
            'filters' => $filters,
        ]);
    }
}
