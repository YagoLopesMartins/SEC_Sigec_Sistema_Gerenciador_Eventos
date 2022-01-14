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
									<option value="{{ $espaco->espaco_id ?? old('espaco_id') }}">{{$espaco->espaco_nome}}</option>
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

	<script>
		$(document).ready(function () {
			
			var SITEURL = "{{ url('/') }}";
			
			$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
	  
				var calendar = $('#calendar').fullCalendar({
						editable: true,
						events: SITEURL + "/visitacaoEspacos",
						displayEventTime: false,
						editable: true,
						eventRender: function (event, element, view) {
							if (event.allDay === 'true') {
									event.allDay = true;
							} else {
									event.allDay = false;
							}
						},
						selectable: true,
						selectHelper: true,
						select: function (start, end, allDay) {
							var title = prompt('Event Title:');
							if (title) {
								var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
								var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
								$.ajax({
									url: SITEURL + "/fullcalenderAjax",
									data: {
										title: title,
										start: start,
										end: end,
										type: 'add'
									},
									type: "POST",
									success: function (data) {
										displayMessage("Event Created Successfully");
	  
										calendar.fullCalendar('renderEvent',
											{
												id: data.id,
												title: title,
												start: start,
												end: end,
												allDay: allDay
											},true);
	  
										calendar.fullCalendar('unselect');
									}
								});
							}
						},
						eventDrop: function (event, delta) {
							var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
							var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
	  
							$.ajax({
								url: SITEURL + '/fullcalenderAjax',
								data: {
									title: event.title,
									start: start,
									end: end,
									id: event.id,
									type: 'update'
								},
								type: "POST",
								success: function (response) {
									displayMessage("Event Updated Successfully");
								}
							});
						},
						eventClick: function (event) {
							var deleteMsg = confirm("Do you really want to delete?");
							if (deleteMsg) {
								$.ajax({
									type: "POST",
									url: SITEURL + '/fullcalenderAjax',
									data: {
											id: event.id,
											type: 'delete'
									},
									success: function (response) {
										calendar.fullCalendar('removeEvents', event.id);
										displayMessage("Event Deleted Successfully");
									}
								});
							}
						}
				});
		});
	 
		function displayMessage(message) {
			toastr.success(message, 'Event');
		} 
	  
	</script>
	<script>
		// setTimeout(function() { document.location.reload(1);},5000)
	</script>
@stop
