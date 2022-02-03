<?php

use App\Http\Controllers\{
    AgendamentoVisitacaoController,
    SubCategoriaController,
    CategoriaController,
    DiretoriaController,
    EspacoController,
    GerenciaController,
    OrgaoController,
    PautaController,
    ResponsavelEspacoController,
    ResponsavelEventoController,
    UsuarioController,
    UserController,
    UsuarioProfileController,
    UserProfileController,
    SiteController,
    DashboardController,
    ProgramacaoEventosController,
    VisitacaoEspacosController,
    FullCalenderController,
    HorariosVisitacaoController,
    VisitacaoController
};
use App\Http\Controllers\ACL\
{
    PermissionController,
    ProfileController,
    PermissionProfileController,
    RoleController,
    RoleUserController,
    PermissionRoleController,
};
use App\Models\SubCategoria;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use LaravelQRCode\Facades\QRCode;

Route::middleware(['auth'])->group(function () {
    /**
    * Role x User
    */
    Route::get('usuarios/{id}/role/{idRole}/detach',  [RoleUserController::class, 'detachRoleUser'])->name('usuarios.role.detach');
    Route::post('usuarios/{id}/roles',                [RoleUserController::class, 'attachRolesUser'])->name('usuarios.roles.attach');
    Route::any('usuarios/{id}/roles/create',          [RoleUserController::class, 'rolesAvailable'])->name('usuarios.roles.available');
    Route::get('usuarios/{id}/roles',                 [RoleUserController::class, 'roles'         ])->name('usuarios.roles');
    Route::get('roles/{id}/usuarios',                 [RoleUserController::class, 'users'         ])->name('roles.usuarios');

    /**
    * Permission x Role
    */
    Route::get('roles/{id}/permission/{idPermission}/detach', [PermissionRoleController::class, 'detachPermissionRole'])->name('roles.permission.detach');
    Route::post('roles/{id}/permissions',                     [PermissionRoleController::class, 'attachPermissionsRole'])->name('roles.permissions.attach');
    Route::any('roles/{id}/permissions/create',               [PermissionRoleController::class, 'permissionsAvailable'])->name('roles.permissions.available');
    Route::get('roles/{id}/permissions',                      [PermissionRoleController::class, 'permissions'])->name('roles.permissions');
    Route::get('permissions/{id}/role',                       [PermissionRoleController::class, 'roles'])->name('permissions.roles');

    /**
    * Routes Roles
    */
    Route::any('roles/search', [RoleController::class, 'search'])->name('roles.search');
    Route::resource('roles',    RoleController::class);

    /**
     * Routes Orgaos
     */
    Route::get('orgaos/create',         [OrgaoController::class, 'create' ]);
    Route::put('orgaos/{id}',           [OrgaoController::class, 'update' ]);
    Route::get('orgaos/{id}/edit',      [OrgaoController::class, 'edit'   ]);
    Route::any('orgaos/search',         [OrgaoController::class, 'search' ]);
    Route::delete('orgaos/{id}',        [OrgaoController::class, 'destroy']);
    Route::get('orgaos/{id}',           [OrgaoController::class, 'show'   ]);
    Route::post('orgaos',               [OrgaoController::class, 'store'  ]);
    Route::get('orgaos',                [OrgaoController::class, 'index'  ]);

    /**
     * Routes Categorias
     */
    Route::get('categorias/create',         [CategoriaController::class, 'create' ]);
    Route::put('categorias/{id}',           [CategoriaController::class, 'update' ]);
    Route::get('categorias/{id}/edit',      [CategoriaController::class, 'edit'   ]);
    Route::any('categorias/search',         [CategoriaController::class, 'search' ]);
    Route::delete('categorias/{id}',        [CategoriaController::class, 'destroy']);
    Route::get('categorias/{id}',           [CategoriaController::class, 'show'   ]);
    Route::post('categorias',               [CategoriaController::class, 'store'  ]);
    Route::get('categorias',                [CategoriaController::class, 'index'  ]);

    /**
     * Routes SubCategorias
     */
    Route::get('subcategorias/create',      [SubCategoriaController::class, 'create' ]);
    Route::put('subcategorias/{id}',        [SubCategoriaController::class, 'update' ]);
    Route::get('subcategorias/{id}/edit',   [SubCategoriaController::class, 'edit'   ]);
    Route::any('subcategorias/search',      [SubCategoriaController::class, 'search' ]);
    Route::delete('subcategorias/{id}',     [SubCategoriaController::class, 'destroy']);
    Route::get('subcategorias/{id}',        [SubCategoriaController::class, 'show'   ]);
    Route::post('subcategorias',            [SubCategoriaController::class, 'store'  ]);
    Route::get('subcategorias',             [SubCategoriaController::class, 'index'  ]);

    /**
     * Routes Dirtorias
     */
    Route::get('diretorias/create',      [DiretoriaController::class, 'create' ]);
    Route::put('diretorias/{id}',        [DiretoriaController::class, 'update' ]);
    Route::get('diretorias/{id}/edit',   [DiretoriaController::class, 'edit'   ]);
    Route::any('diretorias/search',      [DiretoriaController::class, 'search' ]);
    Route::delete('diretorias/{id}',     [DiretoriaController::class, 'destroy']);
    Route::get('diretorias/{id}',        [DiretoriaController::class, 'show'   ]);
    Route::post('diretorias',            [DiretoriaController::class, 'store'  ]);
    Route::get('diretorias',             [DiretoriaController::class, 'index'  ]);

    /**
     * Routes Gerencias
     */
    Route::get('gerencias/create',      [GerenciaController::class, 'create' ]);
    Route::put('gerencias/{id}',        [GerenciaController::class, 'update' ]);
    Route::get('gerencias/{id}/edit',   [GerenciaController::class, 'edit'   ]);
    Route::any('gerencias/search',      [GerenciaController::class, 'search' ]);
    Route::delete('gerencias/{id}',     [GerenciaController::class, 'destroy']);
    Route::get('gerencias/{id}',        [GerenciaController::class, 'show'   ]);
    Route::post('gerencias',            [GerenciaController::class, 'store'  ]);
    Route::get('gerencias',             [GerenciaController::class, 'index'  ]);

    /**
     * Routes Pautas
     */
    Route::get('pautas/create',             [PautaController::class, 'create' ]);
    Route::put('pautas/{id}',               [PautaController::class, 'update' ]);
    Route::get('pautas/{id}/edit',          [PautaController::class, 'edit'   ]);
    Route::any('pautas/search',             [PautaController::class, 'search' ]);
    Route::delete('pautas/{id}',            [PautaController::class, 'destroy']);
    Route::get('pautas/{id}',               [PautaController::class, 'show'   ]);
    Route::post('pautas',                   [PautaController::class, 'store'  ]);
    Route::get('pautas',                    [PautaController::class, 'index'  ]);

    /**
     * Routes Espacos
     */
    Route::get('espacos/create',             [EspacoController::class, 'create' ]);
    Route::put('espacos/{id}',               [EspacoController::class, 'update' ]);
    Route::get('espacos/{id}/edit',          [EspacoController::class, 'edit'   ]);
    Route::any('espacos/search',             [EspacoController::class, 'search' ]);
    Route::delete('espacos/{id}',            [EspacoController::class, 'destroy']);
    Route::get('espacos/{id}',               [EspacoController::class, 'show'   ]);
    Route::post('espacos',                   [EspacoController::class, 'store'  ]);
    Route::get('espacos',                    [EspacoController::class, 'index'  ]);

    /**
     * Routes Responsaveis espaço
     */
    Route::get('responsavelEspaco/create',       [ResponsavelEspacoController::class, 'create' ]);
    Route::put('responsavelEspaco/{id}',         [ResponsavelEspacoController::class, 'update' ]);
    Route::get('responsavelEspaco/{id}/edit',    [ResponsavelEspacoController::class, 'edit'   ]);
    Route::any('responsavelEspaco/search',       [ResponsavelEspacoController::class, 'search' ]);
    Route::delete('responsavelEspaco/{id}',      [ResponsavelEspacoController::class, 'destroy']);
    Route::get('responsavelEspaco/{id}',         [ResponsavelEspacoController::class, 'show'   ]);
    Route::post('responsavelEspaco',             [ResponsavelEspacoController::class, 'store'  ]);
    Route::get('responsavelEspaco',              [ResponsavelEspacoController::class, 'index' ]);

    /**
     * Routes Responsaveis evento
     */
    Route::get('responsavelEventos/create',        [ResponsavelEventoController::class, 'create' ]);
    Route::put('responsavelEventos/{id}',          [ResponsavelEventoController::class, 'update' ]);
    Route::get('responsavelEventos/{id}/edit',     [ResponsavelEventoController::class, 'edit'   ]);
    Route::any('responsavelEventos/search',        [ResponsavelEventoController::class, 'search' ]);
    Route::delete('responsavelEventos/{id}',       [ResponsavelEventoController::class, 'destroy']);
    Route::get('responsavelEventos/{id}',          [ResponsavelEventoController::class, 'show'   ]);
    Route::post('responsavelEventos',              [ResponsavelEventoController::class, 'store'  ]);
    Route::get('responsavelEventos',               [ResponsavelEventoController::class, 'index' ]);

    /**
    * Usuario x Profile
    */
    Route::get('usuarios/{id}/profile/{idProfile}/detach',  [UsuarioProfileController::class, 'detachUsuarioProfile' ])->name('usuarios.profile.detach');
    Route::post('usuarios/{id}/profiles',                   [UsuarioProfileController::class, 'attachUsuarioProfiles'])->name('usuarios.profiles.attach');
    Route::any('usuarios/{id}/profiles/create',             [UsuarioProfileController::class, 'profilesAvailable'    ])->name('usuarios.profiles.available');
    Route::get('usuarios/{id}/profiles',                    [UsuarioProfileController::class, 'profiles'             ])->name('usuarios.profiles');
    Route::get('permissions/{id}/usuarios',                 [UsuarioProfileController::class, 'usuarios'             ])->name('profiles.usuarios');

    /**
    * User x Profile
    */
    Route::get('users/{id}/profile/{idProfile}/detach',  [UserProfileController::class, 'detachUserProfile'    ])->name('users.profile.detach');
    Route::post('users/{id}/profiles',                   [UserProfileController::class, 'attachUserProfiles'   ])->name('users.profiles.attach');
    Route::any('users/{id}/profiles/create',             [UserProfileController::class, 'profilesAvailable'    ])->name('users.profiles.available');
    Route::get('users/{id}/profiles',                    [UserProfileController::class, 'profiles'             ])->name('users.profiles');
    Route::get('profiles/{id}/users',                    [UserProfileController::class, 'users'                ])->name('profiles.users');

    /**
    * Permission x Profile
    */
    Route::get('profiles/{id}/permission/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionProfile'])->name('profiles.permission.detach');
    Route::post('profiles/{id}/permissions',                     [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');
    Route::any('profiles/{id}/permissions/create',               [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions',                      [PermissionProfileController::class, 'permissions'])->name('profiles.permissions');
    Route::get('permissions/{id}/profile',                       [PermissionProfileController::class, 'profiles'])->name('permissions.profiles');
    /**
    * Routes Permissions
    */
    Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
    Route::resource('permissions',   PermissionController::class);
    /**
    * Routes Profiles
    */
    Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
    Route::resource('profiles',    ProfileController::class);

    /**
     * Routes Usuarios
     */
    Route::get('usuarios/create',             [UsuarioController::class, 'create' ]);
    Route::put('usuarios/{id}',               [UsuarioController::class, 'update' ]);
    Route::get('usuarios/{id}/edit',          [UsuarioController::class, 'edit'   ]);
    Route::any('usuarios/search',             [UsuarioController::class, 'search' ]);
    Route::delete('usuarios/{id}',            [UsuarioController::class, 'destroy']);
    Route::get('usuarios/{id}',               [UsuarioController::class, 'show'   ]);
    Route::post('usuarios',                   [UsuarioController::class, 'store'  ]);
    Route::get('usuarios',                    [UsuarioController::class, 'index'  ]);

    /**
     * Routes Users
     */
    Route::get('usuarios/create',             [UserController::class, 'create' ]);
    Route::put('usuarios/{id}',               [UserController::class, 'update' ]);
    Route::get('usuarios/{id}/edit',          [UserController::class, 'edit'   ]);
    Route::any('usuarios/search',             [UserController::class, 'search' ]);
    Route::delete('usuarios/{id}',            [UserController::class, 'destroy']);
    Route::get('usuarios/{id}',               [UserController::class, 'show'   ]);
    Route::post('usuarios',                   [UserController::class, 'store'  ]);
    Route::get('usuarios',                    [UserController::class, 'index'  ]);

    Route::get('/', function () {
        return view('admin');
    });
});

Route::get('admin',                       [DashboardController::class, 'index'])->name('admin.index');
Route::get('site',                        [SiteController::class, 'index']);

Route::get('programacaoEventos',          [ProgramacaoEventosController::class, 'index']);
Route::post('fullcalenderAjax',           [ProgramacaoEventosController::class, 'ajax']);

// Testes
Route::get('visitacaoEspacos/visitante',    [VisitacaoEspacosController::class, 'visitante']);
Route::get('visitacaoEspacos/qrcode/{id}',  [VisitacaoEspacosController::class, 'qrcode']);
Route::any('visitacaoEspacos/search',       [VisitacaoEspacosController::class, 'search']);
Route::delete('visitacaoEspacos/{id}',      [VisitacaoEspacosController::class, 'destroy']);
Route::post('visitacao/espacos/create',       [VisitacaoEspacosController::class, 'store']);
Route::post('fullcalenderAjax',             [VisitacaoEspacosController::class, 'ajax']);
Route::get('visitacaoEspacos',              [VisitacaoEspacosController::class, 'index']);
Route::get('visitacaoEspacos/form',         [VisitacaoEspacosController::class, 'index2']);
Route::post('dynamicdependent/fetch',       [VisitacaoEspacosController::class, 'fetch'])->name('dynamicdependent.fetch');
// Route::post('dynamicdependent/fetch',     [PautaController::class, 'fetch'])->name('dynamicdependent.fetch');

Route::get('visitacoes/create',             [VisitacaoController::class, 'create' ]);
Route::put('visitacoes/{id}',               [VisitacaoController::class, 'update' ]);
Route::get('visitacoes/{id}/edit',          [VisitacaoController::class, 'edit'   ]);
Route::any('visitacoes/search',             [VisitacaoController::class, 'search' ]);
Route::delete('visitacoes/{id}',            [VisitacaoController::class, 'destroy']);
Route::get('visitacoes/{id}',               [VisitacaoController::class, 'show'   ]);
Route::post('visitacoes',                   [VisitacaoController::class, 'store'  ]);
Route::get('visitacoes',                    [VisitacaoController::class, 'index'  ]);

Route::get('fullcalender',                [FullCalenderController::class, 'index']);
Route::post('fullcalenderAjax',           [FullCalenderController::class, 'ajax']);

// 04268680217
require __DIR__.'/auth.php';

Route::get('test-acl', function(){
    // dd(auth()->user());
    // dd(auth()->user()->permissions());
    // dd(auth()->user()->hasPermission('casec'));
    // dd(auth()->user()->isAdminCheckEmail('gio@gios.com.br'));
    // dd(auth()->user()->isAdmin());
});

Route::get('agendamento/fabrica/qrcode',  [AgendamentoVisitacaoController::class, 'qrcode'  ]);
Route::post('agendamento/fabrica/create', [AgendamentoVisitacaoController::class, 'store'  ]);
Route::get('agendamento/fabrica',         [AgendamentoVisitacaoController::class, 'index'  ]);

Route::get('listagem',                    [AgendamentoVisitacaoController::class, 'listagem']);
Route::get('listagem/inscritos/{id}',     [AgendamentoVisitacaoController::class, 'listagemInscritos']);
Route::get('pdf/{id}',                    [AgendamentoVisitacaoController::class, 'listagemPDF']);

Route::get('horarios',                    [HorariosVisitacaoController::class, 'index'  ]);

