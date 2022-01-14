<?php

namespace App\Models\Traits;

//trait UserACLTrait {
trait UsuarioACLTrait {

    // Método retorna todas permissoes do usuário autenticado
    public function permissions(){

        $permissions = [];

        foreach (auth()->user()->profiles as $profile) {
            foreach($profile->permissions as $permission){
                array_push($permissions, $permission->name);
            }
        }
         return $permissions;
    }
    // Método retorna uma permissão especifica do usuário autenticado
    public function hasPermission(string $permissionName):bool {
        return in_array($permissionName, $this->permissions());
    }
     // Método retorna se o usuario é um admin
    public function isAdmin(): bool{
        return in_array($this->email, config('acl.admins'));
    }
    public function NotIsAdmin(): bool{
        return !in_array($this->email, config('acl.admins'));
    }
    public function isAdminCheckEmail(string $email): bool{
        return in_array($email, config('acl.admins'));
    }
}