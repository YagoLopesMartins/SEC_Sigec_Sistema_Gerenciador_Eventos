<div class="modal fade modal-slide-in-right" aria-hidden="true"
    role="dialog" tabindex="-1" id="modal-delete-{{$espacos->espaco_id}}">

    <form action="/espacos/{{$espacos->espaco_id}}" method="POST">
        @csrf
        @method('DELETE')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title">Apagar Espaço</h4>
                        </div>
                        <div class="modal-body">
                            <p>Confirme se deseja apagar o espaço</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                    </div>
                </div>
    </form>
</div>