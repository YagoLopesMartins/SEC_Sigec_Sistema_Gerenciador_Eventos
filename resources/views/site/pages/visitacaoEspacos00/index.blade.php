@extends('adminlte::page')

@section('title', 'Visitação nos espaços')

@section('content_header')
    <h1>Lista de horários</h1>
	@include('site.includes.importsFullCallendarAjax')
@stop

@section('content')

    <div class="container mt-5" style="max-width: 700px;">

		<div class="card">
			<div class="card-header">
				<form action="visitacaoEspacos" method="POST" class="form form-inline">
					@csrf
					<div class="form-group">
						<label>Espaço</label>
						<select class="form-control" name="filter" id="" onchange="this.form.submit()">
							<option value="{{ $filters['filter'] ?? '' }}"> -- Selecione um espaço --</option>
								@foreach($espacos as $espaco)
									<option value="{{ $espaco->espaco_id ?? 
									old('espaco_id') }}">{{$espaco->espaco_id}}</option>
								@endforeach
						</select> 
					</div>
				</form> 
			</div>
		</div> <!--se retirar esta div "cola" ao layout abaixo-->

		<div class="row">
			<div id='calendar'></div>
			@include('site.includes.tabelaHorariosVisitacaoEspacos')
			<hr>
			{{-- @include('site.includes.tabelaHorariosVisitacaoEspaco') --}}
			@include('site.pages.visitacaoEspacos._partials.form')
        </div>
    </div>


@stop
