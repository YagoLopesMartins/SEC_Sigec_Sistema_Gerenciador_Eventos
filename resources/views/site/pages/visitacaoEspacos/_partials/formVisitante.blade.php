@extends('adminlte::page')

@section('title', 'Agendamento de Espaço')

@section('content_header')
 
@stop

@section('content')
        <style>
            .modal-dialog {
                width: 100% !important;
                height: 100% !important;
                margin: auto !important;
                padding: 0 !important;
            }

            .modal-content {
                height: 100% !important;
                width: 100% !important;
                min-height: 100% !important;
                border-radius: 0 !important;
            }
        </style>
	

	<body class="bg-light">

		<header class="container d-print-none">
			<div class="row">
				<div class="col-md-12 py-4 text-right">
					<div id="google_translate_element"></div>
					<script type="text/javascript">
						function googleTranslateElementInit() {new google.translate.TranslateElement({pageLanguage: 'pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE,autoDisplay: false, includedLanguages: ''}, 'google_translate_element');}
					</script>
					<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="py-5 text-center">
						<h2>Bem vindo</h2>
						<p class="lead pt-2">
							Faça seu agendamento para seus espaços favoritos						</p>
					</div>
				</div>
			</div>
		</header>

		<main class="visitante d-print-none">
			<section class="container">
				<div class="row">
					<div class="col-md-12">
						<h4 class="mb-3">Visitante</h4>
						<hr class="mb-3">
					</div>
				</div>

				<div class="row d-print-none">
					<div class="col-md-12">
						<small class="text-justify text-secondary">
							Para agendar uma visita primeiro precisamos te conhecer melhor, nos informe alguns dados
						</small>
					</div>
				</div>

				<div class="row mt-4 d-print-none">
					<div class="col-md-12">
						<form id="visitante">
							<div class="row">
								<div class="col-md-6">
									<select 
										class="custom-select"
										name="Visitante[naturalidade]" 
										id="visitante_naturalidade"
									>
										<option value="" selected disabled>Naturalidade</option>	
										<option value="brasileiro">Brasileiro</option>
										<option value="estrangeiro">Sou Estrangeiro</option>
									</select>
								</div>
								<div class="col-md-6">
									<input
										type="text"
										class="d-none form-control"
										placeholder="Passaporte"
										name="Visitante[passaporte]"
										id="visitante_passaporte"
									>
									<input 
										type="text"
										class="form-control" 
										placeholder="Cadastro de Pessoa Física (CPF)"
										name="Visitante[cpf]" 
										id="visitante_cpf"
										data-mask="000.000.000-00"
									>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input 
										type="text"
										class="form-control" 
										placeholder="Nome Completo"
										name="Visitante[nome]" 
										id="visitante_nome"
									>
								</div>

								<div class="col-md-6">
									<input 
										type="text"
										class="form-control"
										placeholder="Data de Nascimento" 
										name="Visitante[data_nascimento]"
										id="visitante_data_nascimento"
										onfocus="(this.type='date')"
									>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input 
										type="tel"
										class="form-control" 
										placeholder="Contato"
										name="Visitante[telefone]" 
										id="visitante_telefone"
										data-mask="(00) 00000-0000"
									>
								</div>
								<div class="col-md-6">
									<input 
										type="email"
										class="form-control" 
										placeholder="Email"
										name="Visitante[email]" 
										id="visitante_email"
									>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<select 
										class="custom-select"
										name="Visitante[deficiente]" 
										id="visitante_deficiente"
									>
										<option value="" selected disabled>Você é uma Pessoa com Deficiência?</option>	
										<option value="Não">Não</option>
										<option value="Sim">Sim</option>
									</select>
								</div>
								<div class="col-md-6">
									<input 
										type="text"
										class="d-none form-control" 
										placeholder="Informe o tipo de deficiência."
										name="Visitante[deficienteTipo]" 
										id="visitante_deficienteTipo"
									>
								</div>
							</div>
						</form>
					</div>
				</div>
			</section>
		</main>

		<main id="agendamento d-print-none">
			<form id="agenda-visita">
				<section class="container mt-5 d-print-none">
					<div class="row d-print-none">
						<div class="col-md-12">
							<h4 class="mb-3">Agende sua visita</h4>
							<hr class="mb-3">
						</div>
					</div>
					<div class="row d-print-none">
						<div class="col-md-12">
							<small class="text-justify text-secondary">
								Escolha um espaço de sua preferência e agende sua visita. Seleciona uma data e um horário disponível para marcar
							</small>
						</div>
					</div>
					<div class="alert alert-danger mt-2" role="alert">
						Vagas para Fábrica do Papai Noel esgotadas, em breve abriremos novas vagas.
					</div>
					<div class="row mt-2">
						<div class="col-md-12">
							<h6>Selecione um espaço</h6>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-md-12">
							<select class="custom-select" name="Espaco[id]" id="listas_espacos" required>
							<option></option>
								<option value='65'>CENTRO CULTURAL PALÁCIO RIO NEGRO - CCPRN </option><option value='271'>FÁBRICA DO PAPAI NOEL (LARGO de SÃO SEBASTIÃO)</option><option value='104'>PALACETE PROVINCIAL</option><option value='69'>TEATRO AMAZONAS</option>							</select>
						</div>
					</div>
					<div class="row mt-4 d-print-none">
						<div class="col-md-6">
							<label for="calendario">Escolha um dia</label>
							<input 
								type="text"
								class="form-control"
								id="calendario"
								name="Espaco[dia]"
								onfocus="(this.type='date')"
								list="opcoes" required
							>
						</div>
						<div class="col-md-6 d-print-none">
							<div class="row">
								<div class="col-md-12">
									<label>Agora escolha um horário para visitação</label>
								</div>
							</div>
							<div class="row d-print-none">
								<div class="col-md-12">
								<select class="custom-select" name="Espaco[horario]" id="horario" required>
								</select>
								</div>
							</div>
						</div>
					</div>
				</section>
				
			</form>
		</main>
		<main id="acoes" class="container mt-5 d-print-none">
			<section class="row">
				<div class="col-md-12  text-right">
					<input type="hidden" id="token" name="token" value="GqbixOBIfWdXGGdtnjwziNyW1QqrxMzedKwKz8sP5GMLm0eJjLjCzSyAJZ2hMCvZn2JWacLgSy1eygYS2huBa3cT2faPRGOeIybT">
					<button type="button" id="submit" class="btn btn-success">Agendar minha visita</button>
				</div>
			</section>
		</main>
		<footer class="my-5 pt-5 text-muted text-center text-small d-print-none">
			<p class="mb-1">Secretaria de Cultura e Economia Criativa</p>
			<p class="mb-1">Desenvolvimento: Inovação e Tecnologia Audivisual</p>
			<p><small>Navegadores suportados: Google Chrome, Microsoft Edge, Firefox</small></p>				
		</footer>

		<!-- Modal -->
		<div id="modalSucesso" class="modal fade" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Parabéns, sua visita foi agendada</h5>
					</div>
					<div id="comprovantepdf" class="modal-body">
						<h4>COMPROVANTE DE AGENDAMENTO</h4>
						<p class="text-muted">
							<small>Atente-se as observações e leve este comprovante no dia da visita</small>
						</p>
						<h5 class="border-bottom border-gray pb-2 mb-0 mt-4">Informações da Visita</h5>
						<div class="mt-3">
							<img id="imageQRCode" src="https://www.blogson.com.br/wp-content/uploads/2020/12/Gerar-QR-Code-com-jQuery-ou-JavaScript-1.png">
							<p>
								Espaço: <strong id="espaco"></strong> <br>
								Data: <strong id="data"></strong> <br>
								Horário: <strong id="horario"></strong>
							</p>
						</div>
						<h5 class="border-bottom border-gray pb-2 mb-0 mt-4">Informações do Visitante</h5>
						<div class="mt-3">
							<p>
								Documento: <strong id="visitante_cpf"></strong> <br>
								Nome: <strong id="visitante_nome"></strong> <br>
								Contato: <strong id="visitante_contato"></strong> <br>
								Deficiência: <strong id="visitante_deficiente"></strong>
							</p>
						</div>
						<h5 class="d-none border-bottom border-gray pb-2 mb-0 mt-4">Informações do Responsável</h5>
						<div class="d-none mt-3">
							<p>
								Documento: <strong id="responsavel_cpf"></strong> <br>
								Nome: <strong id="responsavel_nome"></strong> <br>
								Contato: <strong id="responsavel_contato"></strong> <br>
								Deficiência: <strong id="responsavel_deficiente"></strong>
							</p>
						</div>
						<h5 class="border-bottom border-gray pb-2 mb-0 mt-4">Observações Importantes</h5>
						<div class="mt-3">
							<p id="observacoes">
								Evite transtornos e esteja 15 minutos antes no local.
							</p>
						</div>
					</div>
					<div class="modal-footer justify-content-center">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
						<button id="gerarPdf" type="button" class="btn btn-primary">Salvar comprovante</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Optional JavaScript -->
    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
		<script>
			$(document).ready(() => {
				const cpfVisitante = $('#visitante_cpf')
				const cpfResponsavel = $('#responsavel_cpf')
				const espacoSelecionado = $('#listas_espacos')
				const calendario = $('#calendario')
				const observacoes = {}

				const diasDaSemana = {
					0: 'Domingo',
					1: 'Segunda-Feira',
					2: 'Terca-Feira',
					3: 'Quarta-Feira',
					4: 'Quinta-Feira',
					5: 'Sexta-Feira',
					6: 'Sábado',
				}

				$('#submit').click(() => {
					const campos = $('select, input').serializeArray()
					const camposJson = {} 
					campos.map((item) => {
						camposJson[item.name] = item.value
					})
					console.log(camposJson);
					$.ajax({
						url: 'https://sistemas.cultura.am.gov.br/sigec/agendamentoEspacos/cadastroVisita',
						dataType: 'json',
						data: camposJson,
						type: 'post',
						beforeSend: () => {},
						success: (data) => {
							console.log(data)
							id_visita = data.id;
							
							if(data.status === 'OK'){
								$('#modalSucesso').modal('show')
								var conteudo = "id=" + id_visita.agendamento_id ;
								var GoogleCharts = 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=';
								var imagemQRCode = GoogleCharts + conteudo;
								$('#imageQRCode').attr('src', imagemQRCode);
							}else{
								alert(data.detalhes)
								if(data.erroType == 'ER'){
									location.reload(true)
								}
							}
						},
						complete:() => {},
						error: (e) => {
							console.log('error', e)
						},
						'cache': false,
					})
				})

				$('#modalSucesso').on('show.bs.modal', (e) => {
					const modal = $('#modalSucesso')
					modal.find('strong#espaco').text(espacoSelecionado.children('option:selected').text())

					const data = (calendario.val()).split('-')
					const dataFormatada = `${data[2]}/${data[1]}/${data[0]}`


					modal.find('strong#data').text(dataFormatada)
					modal.find('strong#horario').text($('#horario').children('option:selected').text().split('(').shift().trim())

					if(cpfVisitante.val()){
						modal.find('strong#visitante_cpf').text(cpfVisitante.val())
					}else{
						modal.find('strong#visitante_cpf').text($('#visitante_passaporte').val())
					}
					modal.find('strong#visitante_nome').text($('#visitante_nome').val())
					modal.find('strong#visitante_contato').text($('#visitante_telefone').val())
					if($('#visitante_deficiente').val() == "Sim"){
						modal.find('strong#visitante_deficiente').text($('#visitante_deficienteTipo').val())
					}else{
						modal.find('strong#visitante_deficiente').text($('#visitante_deficiente').val())
					}

					if(cpfResponsavel.val() || $('#responsavel_passaporte').val()){
						modal.find('h5.d-none').removeClass('d-none')
						modal.find('div.d-none').removeClass('d-none')

						if(cpfResponsavel.val()){
							modal.find('strong#responsavel_cpf').text(cpfResponsavel.val())
						}else{
							modal.find('strong#responsavel_cpf').text($('#visitante_passaporte').val())
						}
						modal.find('strong#responsavel_nome').text($('#responsavel_nome').val())
						modal.find('strong#responsavel_contato').text($('#responsavel_telefone').val())
						if($('#responsavel_deficiente').val() == "Sim"){
							modal.find('strong#responsavel_deficiente').text($('#responsavel_deficienteTipo').val())
						}else{
							modal.find('strong#responsavel_deficiente').text($('#responsavel_deficiente').val())
						}
					}

					horarioSelecionado = Number($('#horario').children('option:selected').val())

					if(observacoes[horarioSelecionado]){
						modal.find('#observacoes').html((observacoes[horarioSelecionado]).replace(/\n/g, '<br />'))
					}
				})

				$('#modalSucesso').on('hidden.bs.modal', () => {
					location.reload(true)
				})

				$('#gerarPdf').click(()=>{
					var doc = $('#comprovantepdf').html();
					window.print();
				})

				$('#fechar').click(()=>{
					window.location.replace('https://cultura.am.gov.br/portal/espacos/')
				})

				$('#visitante_naturalidade').change(() => {
					const selecionado = $('#visitante_naturalidade').children('option:selected').val()
					if(selecionado === 'estrangeiro'){
						cpfVisitante.addClass('d-none');
						$('#visitante_passaporte').removeClass('d-none')
					}else{
						cpfVisitante.removeClass('d-none');
						$('#visitante_passaporte').addClass('d-none')
					}
				})

				$('#responsavel_naturalidade').change(() => {
					const selecionado = $('#responsavel_naturalidade').children('option:selected').val()
					if(selecionado === 'estrangeiro'){
						cpfResponsavel.addClass('d-none');
						$('#responsavel_passaporte').removeClass('d-none')
					}else{
						cpfResponsavel.removeClass('d-none');
						$('#responsavel_passaporte').addClass('d-none')
					}
				})

				$('#visitante_deficiente').change(() => {
					const selecionado = $('#visitante_deficiente').children('option:selected').val()
					if(selecionado === 'Sim'){
						$('#visitante_deficienteTipo').removeClass('d-none')
					}else{
						$('#visitante_deficienteTipo').addClass('d-none')
					}
				})

				$('#responsavel_deficiente').change(() => {
					const selecionado = $('#responsavel_deficiente').children('option:selected').val()
					if(selecionado === 'Sim'){
						$('#responsavel_deficienteTipo').removeClass('d-none')
					}else{
						$('#responsavel_deficienteTipo').addClass('d-none')
					}
				})

				function carregaListaDeHorariosDoEspaco(espaco_id){
					$.ajax({
						url: 'https://sistemas.cultura.am.gov.br/sigec/agendamentoEspacos/diasHorariosDisponiveis',
						dataType: 'json',
						data: { espaco_id: espaco_id },
						type: 'post',
						beforeSend: () => {
							calendario.prop('disabled', true)
							$('#horario').prop('disabled', true)
						},
						success: (data) => {
							datasSerializadas = data.map(espaco => {
								const dia = espaco.hora_inicio.split(' ').shift()
								const diaDaSemana = new Date(dia).getUTCDay()
								return `<option label=${diasDaSemana[diaDaSemana]}>${dia}</option>`
							})

							opcaoDeDatas = datasSerializadas.filter((value, index, self) => {
								return self.indexOf(value) === index
							})

							calendario.prop('type', 'date')
							calendario.after(`<datalist id='opcoes'>${opcaoDeDatas}</datalist>`)

							if(data.length > 1){
								const primeiro = data.shift()
								const ultimo = data.pop()
								
								calendario.prop('type', 'date')
								calendario.prop('min', primeiro.hora_inicio.split(' ').shift())
								calendario.prop('max', ultimo.hora_fim.split(' ').shift())
							}else{
								const [espaco] = data
								calendario.prop('type', 'date')
								calendario.prop('min', espaco.hora_inicio.split(' ').shift())
								calendario.prop('max', espaco.hora_fim.split(' ').shift())
							}
						},
						complete:() => {
							calendario.prop('disabled', false)
							$('#horario').prop('disabled', false)
							$('#horario').html('')
						},	
						error: (e) => {
							console.log('error', e)
						},
						'cache': false,
					})
				}

				espacoSelecionado.change(() => {
					espaco_id = Number(espacoSelecionado.children('option:selected').val())
					carregaListaDeHorariosDoEspaco(espaco_id);
				})

				calendario.change(() => {
					espaco_id = Number(espacoSelecionado.children('option:selected').val())
					dia = calendario.val()

					$.ajax({
						url: 'https://sistemas.cultura.am.gov.br/sigec/agendamentoEspacos/diasHorariosDisponiveis',
						dataType: 'json',
						data: { 
							espaco_id: espaco_id,
							dia: dia
						},
						type: 'post',
						beforeSend: () => {
							$('#horario').prop('disabled', true)
						},
						success: (data) => {
							const horarios = data.map(horario => {
								observacoes[horario.id] = horario.observacao
								return `<option value="${horario.id}">${horario.hora_inicio_formated} (${horario.vagas_abertas} vagas)</option>`
							})


							$('#horario').html(horarios)
						},
						complete:() => {
							$('#horario').prop('disabled', false)
						},
						error: (e) => {
							console.log('error', e)
						},
						'cache': false,
					})
				})

				cpfVisitante.focusout(() => {
					if((cpfVisitante.val()).length === 14) {
						$.ajax({
							url: 'https://sistemas.cultura.am.gov.br/sigec/visitacao/visitante/checkCpf',
							dataType: 'json',
							data: { cpf: cpfVisitante.val() },
							type: 'get',
							beforeSend: () => {
								$('#visitante_nome').prop('disabled', true)
								$('#visitante_data_nascimento').prop('disabled', true)
								$('#visitante_telefone').prop('disabled', true)
								$('#visitante_naturalidade').prop('disabled', true)
								$('#visitante_email').prop('disabled', true)
							},
							success: (data) => {
								$('#visitante_nome').val(data.nome).prop('disabled', false)
								$('#visitante_data_nascimento').prop('type', 'date').val(data.data_nascimento).prop('disabled', false)
								$('#visitante_telefone').val(data.telefone).prop('disabled', false)
								$('#visitante_naturalidade').val(data.naturalidade).prop('disabled', false)
								$('#visitante_email').val(data.email).prop('disabled', false)
								checaNascimentoVisitante()
							},
							complete:() => {
								$('#visitante_nome').prop('disabled', false)
								$('#visitante_data_nascimento').prop('disabled', false)
								$('#visitante_telefone').prop('disabled', false)
								$('#visitante_naturalidade').prop('disabled', false)
								$('#visitante_email').prop('disabled', false)
							},
							error: (e) => {
								if(e.message === 'Not content'){
									$('#visitante_nome').val('').prop('disabled', false)
									$('#visitante_data_nascimento').prop('type', 'date').val('').prop('disabled', false)
									$('#visitante_telefone').val('').prop('disabled', false)
									$('#visitante_naturalidade').val('').prop('disabled', false)
									$('#visitante_email').val('').prop('disabled', false)
								}
							},
							'cache': false,
						})
					}
				})

				cpfResponsavel.focusout(() => {
					if((cpfResponsavel.val()).length === 14) {
						$.ajax({
							url: 'https://sistemas.cultura.am.gov.br/sigec/visitacao/visitante/checkCpf',
							dataType: 'json',
							data: { cpf: cpfResponsavel.val() },
							type: 'get',
							beforeSend: () => {
								$('#responsavel_nome').prop('disabled', true)
								$('#responsavel_data_nascimento').prop('disabled', true)
								$('#responsavel_telefone').prop('disabled', true)
								$('#responsavel_naturalidade').prop('disabled', true)
								$('#responsavel_email').prop('disabled', true)
							},
							success: (data) => {
								$('#responsavel_nome').val(data.nome).prop('disabled', false)
								$('#responsavel_data_nascimento').prop('type', 'date').val(data.data_nascimento).prop('disabled', false)
								$('#responsavel_telefone').val(data.telefone).prop('disabled', false)
								$('#responsavel_naturalidade').val(data.naturalidade).prop('disabled', false)
								$('#responsavel_email').val(data.email).prop('disabled', false)
							},
							complete:() => {
								$('#responsavel_nome').prop('disabled', false)
								$('#responsavel_data_nascimento').prop('disabled', false)
								$('#responsavel_telefone').prop('disabled', false)
								$('#responsavel_naturalidade').prop('disabled', false)
								$('#responsavel_email').prop('disabled', false)
								checaMesmoCpf()
								checaNascimentoResponsavel()
							},
							error: (e) => {
								if(e.message === 'Not content'){
									$('#responsavel_nome').val('').prop('disabled', false)
									$('#responsavel_data_nascimento').prop('type', 'date').val('').prop('disabled', false)
									$('#responsavel_telefone').val('').prop('disabled', false)
									$('#responsavel_naturalidade').prop('disabled', false)
									$('#responsavel_email').val('').prop('disabled', false)
								}
							},
							'cache': false,
						})
					}
				})

				const onload = () => {
					const url   = window.location.search.replace("?", "")
					const [,name] = url.split('=')

					if(name === 'bumbodromo'){
						espaco_id = Number(espacoSelecionado.children('option:selected').val())
						carregaListaDeHorariosDoEspaco(espaco_id);
					}
				}
				onload()
			})

		</script>
	    <script type="text/javascript" src="/sigec/themes/sigec/js/views/agendamentoEspacos/app.js"></script>
    </body>
