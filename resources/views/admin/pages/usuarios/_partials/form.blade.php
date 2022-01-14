@include('admin.includes.alerts')
    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="name" class="form-control" placeholder="Ex.: Mome completo" required
        value="{{ $usuarios->name ?? old('name') }}">
    </div>
    <div class="form-group">
        <label>Login:</label>
        <input type="text" name="usuario_login" class="form-control" placeholder="" required
        value="{{ $usuarios->usuario_login ?? old('usuario_login') }}">
    </div>

    <div class="form-group">
        <label>Senha:</label>
        <input type="password" name="password" class="form-control" placeholder="minimo 8 caracteres" required
        >
    </div>
    <div class="form-group">
        <label>E-mail:</label>
        <input type="email" name="email" class="form-control" placeholder="Ex.: seuemail@provedor.com"  required
        value="{{ $usuarios->email ?? old('email') }}">
    </div>

<div class="row">
    <label class="">Orgão</label>
    <div class="form-group"> 
        <select class="form-control" name="orgao_id" id="orgao_id">
            <option value="">-- Selecione o orgão --</option>
                @foreach($orgaos as $orgao)
                    <option  value="{{ $orgao->orgao_id ?? old('orgao_id') }}" >
                        {{-- @if ( $orgao->orgao_id === $usuarios->orgao_id ) { 'selected'; } @endif > --}}
                            {{ $orgao->orgao_nome }}
                    </option>
                @endforeach
        </select>
    </div>

    <label class="">Diretoria</label>
    <div class="form-group"> 
        <select class="form-control" name="diretoria_id" id="diretoria_id">
            <option value="">-- Selecione a diretoria --</option>
                @foreach($diretorias as $diretoria)
                    <option value="{{$diretoria->diretoria_id ?? old('diretoria_id') }}" >
                        {{-- @if ( $diretoria->diretoria_id === $usuarios->diretoria_id ) { 'selected'; } @endif > --}}
                        {{$diretoria->diretoria_nome}}
                    </option>
                @endforeach
        </select>
    </div>

    <label class="">Gerência</label>
    <div class="form-group"> 
        <select class="form-control" name="gerencia_id" id="gerencia_id">
            <option value="">-- Selecione a gerência --</option>
                @foreach($gerencias as $gerencia)
                    <option value="{{$gerencia->gerencia_id ?? old('gerencia_id') }}" >
                        {{-- @if ( $gerencia->gerencia_id === $usuarios->gerencia_id ) { 'selected'; } @endif > --}}
                        {{$gerencia->gerencia_nome}}
                    </option>
                @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>