@extends('adminlte::page')

@section('title', 'Sigec | migração')

@section('content_header')
<script src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="/pautas" class="active">Pautas</a></li>
    </ol>
    <h1>LISTA DE PAUTAS
        <a href="pautas/create">
            <i class="fas fa-plus-square"></i> 
            Adicionar
        </a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="pautas/search" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Pesquisar... " class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Pesquisar</button>
            </form>
        </div>
    </div> <!--se retirar esta div "cola" ao layout abaixo-->
    <div class="card-body">
        @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Titulo</th>
                        <th>Gerencia</th>
                        <th>Num doc físico</th>
                        <th>Espaço</th>
                        {{-- <th>imagem</th> --}}

                        <!--  <th>Resp Interno</th>  <th>Resp Evento</th> -->
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($pautas as $pauta)
                        <tr>
                            <td>{{ $pauta->pauta_id }}</td>
                         
                            @if( $pauta->pauta_status === "Cancelado")
                                <td title="Cancelado" 
                                    style="text-decoration: underline overline black; color: red; font-weight: bold;"> 
                                    {{ $pauta->pauta_status }}
                                </td>
                            @elseif($pauta->pauta_status === "Aberto")
                                <td title="Aberto" 
                                    style="text-decoration: underline overline black; color: yellow; font-weight: bold;"> 
                                    {{ $pauta->pauta_status }}
                                 </td>
                            @elseif($pauta->pauta_status === "Em análise")
                                <td title="Em análise" 
                                    style="text-decoration: underline overline black; color: black; font-weight: bold;"> 
                                    {{ $pauta->pauta_status }}
                                 </td>
                            @elseif($pauta->pauta_status === "Correção")
                                 <td title="Correção" 
                                     style="text-decoration: underline overline black; color: orange; font-weight: bold;"> 
                                     {{ $pauta->pauta_status }}
                                  </td>
                            @elseif($pauta->pauta_status === "Aprovado")
                                 <td title="Aprovado" 
                                     style="text-decoration: underline overline black; color: green; font-weight: bold;"> 
                                     {{ $pauta->pauta_status }}
                                  </td>
                            @endif
                            {{-- <td>{{ $pauta->pauta_status }}</td>  --}}
                            <td>{{ $pauta->titulo }}</td> 
                             {{-- <td>{{ $pauta->gerencia->gerencia_nome }}</td> --}} 
                            <td>{{ $pauta->gerencia_id }}</td> 
                            <td>{{ $pauta->numero_documento_fisico }}</td>
                             {{-- <td>{{ $pauta->espaco->espaco_nome }}</td> --}} 
                            <td>{{ $pauta->espaco_id }}
                            {{-- <td>{{ $pauta->imagem_arquivo }}</td> --}}
                            {{--<td>{{ $pauta->responsavel_evento }}</td> <td>{{ $pauta->responsavel_interno }}</td> --}}

                            <td style="width=10px;">
                               <!--class="btn btn-warning" class="btn btn-info"-->
                                <a href="pautas/{{$pauta->pauta_id}}/edit" class="#" title="Editar">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="" data-target="#modal-delete-{{$pauta->pauta_id}}" data-toggle="modal" title="Excluir">
                                    {{-- <button class="btn btn-danger">Excluir</button> --}}
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="pautas/{{$pauta->pauta_id}}" class="#" title="Visualizar">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @can('admin')
                                  <a href="pautas/{{$pauta->pauta_id}}/edit" class="" title="Analizar">
                                    <i class="fas fa-user-tie"></i>
                                  </a>
                                @endcan
                                {{-- <a href="/pautas/{{$pauta->id}}/edit" class="" title="Editar">
                                    <i class="fas fa-user-tie"></i>
                                </a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @include('admin.pages.pautas.modal')
            </table>
        </div>
        <div class="card-footer">
            {!! $pautas->links() !!}
            {{-- {!! $pautas->links("pagination::bootstrap-4") !!} --}}
        </div>
    </div>

    @include('admin.includes.legendaBotoes')
@stop
