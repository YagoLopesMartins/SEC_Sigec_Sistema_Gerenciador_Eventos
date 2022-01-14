<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    protected $user, $profile;

    public function __construct(User $user, Profile $profile)
    {
        $this->user = $user;
        $this->profile = $profile;
       // $this->middleware(['can:plans']);
    }

    public function profiles($idUser)
    {
        if (!$user = $this->user->find($idUser)) {
            return redirect()->back();
        }

        $profiles = $user->profiles()->paginate();

        // return view('admin.pages.usuarios.profiles.profiles', compact('usuarios', 'profiles'));
        return view('admin.pages.usuarios.profiles.profiles', compact('user', 'profiles'));
    }

    public function users($idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        $usuarios = $profile->users()->paginate();

        return view('admin.pages.profiles.usuarios.usuarios', compact('profile', 'usuarios'));
    }

    public function profilesAvailable(Request $request, $idUser)
    {
        if (!$user = $this->user->find($idUser)) {
            return redirect()->back();  
        }

        $filters = $request->except('_token');

        $profiles = $user->profilesAvailable($request->filter);

        return view('admin.pages.usuarios.profiles.available', compact('user', 'profiles', 'filters'));
    }

    public function attachUserProfiles(Request $request, $idUser)
    {
        if (!$user = $this->user->find($idUser)) {
            return redirect()->back();
        }

        if (!$request->profiles || count($request->profiles) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos um user');
        }

        $user->profiles()->attach($request->profiles);

        return redirect()->route('users.profiles', $user->id);
    }

    public function detachUserProfile($idUser, $idProfile)
    {
        $user = $this->user->find($idUser);
        $profile = $this->profile->find($idProfile);

        if (!$user || !$profile) {
            return redirect()->back();
        }

        $user->profiles()->detach($profile);

        return redirect()->route('users.profiles', $user->id);
    }
}