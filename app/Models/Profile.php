<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * Get Permissions
     */

     public function permissions()
     {
        return $this->belongsToMany(Permission::class);
     }
    /**
     * Get Usuários
     */
     public function usuarios(){
        return $this->belongsToMany(Usuario::class, 'usuarios_profile', 'usuario_id', 'profile_id');
    }
    public function users(){
        return $this->belongsToMany(User::class, 'user_profile', 'user_id', 'profile_id');
    }
     /**
     * Permission not linked with this profile
     */
    public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('permissions.id', function($query) {
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $permissions;
    }
}
