@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Dashboard administrativo</h1>
@stop
 @section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-users"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Usuários</span>
                {{-- <span class="info-box-number">{{ $totalUsers }}</span> --}}
                <span class="info-box-number">1059</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-tablet"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Pautas</span>
                {{-- <span class="info-box-number">{{ $totalTables }}</span> --}}
                <span class="info-box-number">255</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-layer-group"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Categorias</span>
                {{-- <span class="info-box-number">{{ $total_categorias }}</span> --}}
                {{-- <span class="info-box-number">{{ $totalCategorias }}</span> --}}
                   <span class="info-box-number">55</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-hamburger"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Espaços</span>
                {{-- <span class="info-box-number">{{ $totalProducts }}</span> --}}
                <span class="info-box-number">102</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        {{-- @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-building"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Empresas</span>
                <span class="info-box-number">{{ $totalTenants }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin

        @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-list-alt"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Planos</span>
                <span class="info-box-number">{{ $totalPlans }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin

        @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-address-card"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Cargos</span>
                <span class="info-box-number">{{ $totalRoles }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin

        @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-address-book"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Perfis</span>
                <span class="info-box-number">{{ $totalProfiles }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin

        @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-lock"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Permissões</span>
                <span class="info-box-number">{{ $totalPermissions }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin --}}
    </div>
 @stop