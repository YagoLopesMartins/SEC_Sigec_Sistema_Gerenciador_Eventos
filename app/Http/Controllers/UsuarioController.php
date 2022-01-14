<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUsuario;
use App\Models\Diretoria;
use App\Models\Gerencia;
use App\Models\Orgao;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UsuarioController extends Controller
{
    private $repository, $gerencia, $diretoria, $orgao;

    public function __construct(Usuario $usuario, Gerencia $gerencia, Diretoria $diretoria, Orgao $orgao) {
        $this->repository   = $usuario;
        $this->gerencia     = $gerencia;
        $this->diretoria    = $diretoria;
        $this->orgao        = $orgao;
        // $this->middleware(['can:plans']);
    }

    public function index() {

        $usuarios = $this->repository
                ->where('usuario_estado','=','Ativo')
                ->latest()
                ->paginate(2);
        // $plans = $this->repository->paginate(1);
        return view('admin.pages.usuarios.index', [
            'usuarios' => $usuarios,
        ]);
    }

    public function create() {

        $orgaos = $this->orgao->all();
        $diretorias = $this->diretoria->all();
        $gerencias = $this->gerencia->all();

        return view('admin.pages.usuarios.create', compact('orgaos', 'diretorias', 'gerencias'));
    }

    public function store(StoreUpdateUsuario $request)
    {
        $data = $request->all();
        $data['usuario_password'] = bcrypt($data['usuario_password']); // encrypt password
        //  dd($request); use Illuminate\Support\Str; $data = $request->all(); $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);
        return redirect('usuarios')
            ->withSuccess('Usuário cadastrada com sucesso');
        // if($this->repository->create($request->all())){
        //     $request->session()->flash('success', 'Usuario cadastrada com Sucesso!');
        //     return redirect()->route('usuarios.index');
        // }
    }
    public function show($id)
    {
        $usuarios = $this->repository->where('usuario_id', $id)->first();

        if (!$usuarios)
            return redirect()->back();

        return view('admin.pages.usuarios.show', [
            'usuarios' => $usuarios
        ]);
    }

    public function edit($id)
    {
        $orgaos = $this->orgao->all();
        $diretorias = $this->diretoria->all();
        $gerencias = $this->gerencia->all();
        $usuarios = $this->repository->where('usuario_id', $id)->first();

        if (!$usuarios)
            return redirect()->back();

        return view('admin.pages.usuarios.edit',  compact('usuarios','orgaos', 'diretorias', 'gerencias'));
    }

    public function update(StoreUpdateUsuario $request, $id)
    {
        $usuario = $this->repository->where('usuario_id', $id)->first();

        if (!$usuario)
            return redirect()->back();

        $data = $request->only(['usuario_nome', 'usuario_email']);

        if ($request->password) {
                $data['usuario_password'] = bcrypt($request->usuario_password);
        }

        // $usuario->update($request->all());
        $usuario->update($data);

        return redirect('usuarios');
    }
    
    public function destroy($id)
    {
        $usuario = $this->repository
                        // ->with('details')
                        ->where('usuario_id', $id)
                        ->first();

        if (!$usuario)
            return redirect()->back();
        
        $usuario->usuario_estado = 'Inativo';
        $usuario->update();

        return redirect('usuarios');
    }
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $usuarios = $this->repository->search($request->filter);

        return view('admin.pages.usuarios.index', [
            'usuarios' => $usuarios,
            'filters' => $filters,
        ]);
    }
}
