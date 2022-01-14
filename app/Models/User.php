<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Traits\UsuarioACLTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UsuarioACLTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'usuario_login',
        'usuario_imagem',
        'usuario_estado',
        'gerencia_id',
        'orgao_id',
        'diretoria_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
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
        // return $this->belongsToMany(Profile::class, 'user_profile' , 'user_id', 'profile_id' );
        return $this->belongsToMany(Profile::class , 'user_profile', 'user_id', 'profile_id');
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
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->paginate();
        return $results;
    }

    /**
     * Profiles not linked with this usuario
     */
    public function profilesAvailable($filter = null)
    {
        $profiles  = Profile::whereNotIn('profiles.id', function($query) {
            $query->select('user_profile.profile_id');
            $query->from('user_profile');
            $query->whereRaw("user_profile.user_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $profiles;
    }
}
