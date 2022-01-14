<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioProfileController extends Controller
{
    protected $usuario, $profile;

    public function __construct(Usuario $usuario, Profile $profile)
    {
        $this->usuario = $usuario;
        $this->profile = $profile;

       // $this->middleware(['can:plans']);
    }

    public function profiles($idUsuario)
    {
        if (!$usuario = $this->usuario->find($idUsuario)) {
            return redirect()->back();
        }

        $profiles = $usuario->profiles()->paginate();

        // return view('admin.pages.usuarios.profiles.profiles', compact('usuarios', 'profiles'));
        return view('admin.pages.usuarios.profiles.profiles', compact('usuario', 'profiles'));
    }

    public function usuarios($idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        $usuarios = $profile->usuarios()->paginate();

        return view('admin.pages.profiles.usuarios.usuarios', compact('profile', 'usuarios'));
    }

    public function profilesAvailable(Request $request, $idUsuario)
    {
        if (!$usuario = $this->usuario->find($idUsuario)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $profiles = $usuario->profilesAvailable($request->filter);

        return view('admin.pages.usuarios.profiles.available', compact('usuario', 'profiles', 'filters'));
    }

    public function attachUsuarioProfiles(Request $request, $idUsuario)
    {
        if (!$usuario = $this->usuario->find($idUsuario)) {
            return redirect()->back();
        }

        if (!$request->profiles || count($request->profiles) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos um usuario');
        }

        $usuario->profiles()->attach($request->profiles);

        return redirect()->route('usuarios.profiles', $usuario->usuario_id);
    }

    public function detachUsuarioProfile($idUsuario, $idProfile)
    {
        $usuario = $this->usuario->find($idUsuario);
        $profile = $this->profile->find($idProfile);

        if (!$usuario || !$profile) {
            return redirect()->back();
        }

        $usuario->profiles()->detach($profile);

        return redirect()->route('usuarios.profiles', $usuario->usuario_id);
    }
}
