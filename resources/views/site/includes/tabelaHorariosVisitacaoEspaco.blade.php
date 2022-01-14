<!---->
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>HORA INÍCIO</th>
                        <th>HORA FIM</th>
                        <th>VAGAS</th>
                        <th>VAGAS DISPONÍVEIS</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->start }}</td>
                            <td>{{ $event->end }}</td>
                            <td style="width=10px;">
                                <a href="#" class="btn btn-info" title="Listar">
                                    <i class="fas fa-list"></i>
                                </a>
                                <a href="#" class="btn btn-warning" title="Excluir">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
<!---->
    