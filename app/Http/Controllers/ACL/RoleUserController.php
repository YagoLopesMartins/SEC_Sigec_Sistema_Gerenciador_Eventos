<?php

namespace App\Http\Controllers\ACL;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    protected $usuario, $role;

    public function __construct(Usuario $usuario, Role $role)
    // public function __construct(User $usuario, Role $role)
    {
        $this->usuario = $usuario;
        $this->role = $role;

        // $this->middleware(['can:usuarios']);
    }

    public function roles($idUser)
    {
        $usuario = $this->usuario->find($idUser);
        
        if (!$usuario) {
            return redirect()->back();
        }

        $roles = $usuario->roles()->paginate();
        // dd($roles);

        return view('admin.pages.usuarios.roles.roles', compact('usuario', 'roles'));
    }


    public function usuarios($idRole)
    {
        
        //dd("Aqui entrei usuarios");

        if (!$role = $this->role->find($idRole)) {
            return redirect()->back();
        }

        $usuarios = $role->usuarios()->paginate();

        return view('admin.pages.roles.usuarios.usuarios', compact('role', 'usuarios'));
    }


    public function rolesAvailable(Request $request, $idUser)
    {
        // dd("Aqui entrei rolesAvailable");

        if (!$usuario = $this->usuario->find($idUser)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $roles = $usuario->rolesAvailable($request->filter);

        return view('admin.pages.usuarios.roles.available', compact('usuario', 'roles', 'filters'));
    }


    public function attachRolesUser(Request $request, $idUser)
    {
       // dd("Aqui entrei attachRolesUser");

        if (!$usuario = $this->usuario->find($idUser)) {
            return redirect()->back();
        }

        if (!$request->roles || count($request->roles) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $usuario->roles()->attach($request->roles);

        return redirect()->route('usuarios.roles', $usuario->usuario_id);
    }

    public function detachRoleUser($idUser, $idRole)
    {
        //dd("Aqui entrei detachRoleUser");

        $usuario = $this->usuario->find($idUser);
        $role = $this->role->find($idRole);

        if (!$usuario || !$role) {
            return redirect()->back();
        }

        $usuario->roles()->detach($role);

        return redirect()->route('usuarios.roles', $usuario->usuario_id);
    }
}