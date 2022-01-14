<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UsuarioACLTrait;

class Usuario extends Model 
{
    // use App\Models\UsuarioACLTrait;
    use HasApiTokens, HasFactory, Notifiable, UsuarioACLTrait;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';
    protected $guarded = [];

    public $timestamps = true;

    protected $fillable = [
        'usuario_login', 'usuario_password','usuario_email','usuario_nome','usuario_estado',
        'orgao_id', 'gerencia_id','diretoria_id'
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
       'usuario_password', 
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profiles(){
        return $this->belongsToMany(Profile::class, 'usuarios_profile' , 'usuario_id', 'profile_id' );
    }

    public function orgao(){
        return $this->belongsTo(Orgao::class, 'orgao_id', 'orgao_nome'); 
    }
    public function diretoria(){
        return $this->belongsTo(Diretoria::class, 'diretoria_id', 'diretoria_nome'); 
    }
    public function gerencia(){
        return $this->belongsTo(Gerencia::class, 'gerencia_id', 'gerencia_nome'); 
    }
    
       /**
     * Get Roles
     */
    public function roles()
    {
    return $this->belongsToMany(Role::class, 'role_user' , 'role_id', 'user_id');
    }

    public function search($filter = null){
        $results = $this->where('usuario_nome', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }

    /**
     * Profiles not linked with this usuario
     */
    public function profilesAvailable($filter = null)
    {
        $profiles  = Profile::whereNotIn('profiles.id', function($query) {
            $query->select('usuarios_profile.profile_id');
            $query->from('usuarios_profile');
            $query->whereRaw("usuarios_profile.usuario_id={$this->usuario_id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $profiles;
    }
    /**
     * Roles not linked with this user
     */
    public function rolesAvailable($filter = null)
    {
        $roles = Role::whereNotIn('roles.id', function($query) {
            $query->select('role_user.role_id');
            $query->from('role_user');
            $query->whereRaw("role_user.user_id={$this->usuario_id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('roles.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $roles;
    }
}
