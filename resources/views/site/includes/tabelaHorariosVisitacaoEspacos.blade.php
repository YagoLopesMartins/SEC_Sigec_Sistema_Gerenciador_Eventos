<!---->
<div class="card-body">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>ESPAÇO ID</th>
                <th>DATA</th>
                <th>HORA INÍCIO</th>
                <th>HORA FIM</th>
                <th>VAGAS</th>
                <th>OBS</th>
                <th width="270">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horario_visitacao_espacos as $hve)
                <tr>
                    <td>{{ $hve->espaco_id }}</td>
                    <td>{{ $hve->horario_visitacao_espacos_data }}</td>
                    <td>{{ $hve->horario_visitacao_espacos_hora_inicio }}</td>
                    <td>{{ $hve->horario_visitacao_espacos_hora_fim }}</td>
                    <td>{{ $hve->horario_visitacao_espacos_numero_vagas }}</td>
                    <td>{{ $hve->horario_visitacao_espacos_observacoes }}</td>
                    <td style="width=10px;">
                        <a href="visitacaoEspacos/qrcode/{{$hve->id}}" target="_blank" class="btn btn-info" title="Listar">
                            <i class="fas fa-qrcode"></i>
                        </a>
                        <a href="#" class="btn btn-info" title="Listar">
                            <i class="fas fa-list"></i>
                        </a>
                        <a href="visitacaoEspacos/{{$hve->id}}" class="btn btn-warning" title="Excluir">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!---->