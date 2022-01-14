<div class="form-group">
    <label>E-mail:</label>
    <input type="email" name="espaco_email" class="form-control" placeholder="Ex.: seuemail@gmail.com" required
    value="{{ $espacos->espaco_email ?? old('espaco_email') }}">
</div>
<div class="form-group">
    <label>Telefone:</label>
    <input type="text" name="espaco_telefone" class="form-control" placeholder="Ex.: 92 992624522" required
    value="{{ $espacos->espaco_telefone ?? old('espaco_telefone') }}">
</div>
<div class="form-group">
    <label>Endereço:</label>
    <input type="text" name="espaco_endereco" class="form-control" placeholder="Ex.: Av Eduardo Ribeiro, n 232, Centro" required
    value="{{ $espacos->espaco_endereco ?? old('espaco_endereco') }}">
</div>
<div class="form-group">
    <label>Latidude:</label>
    <input type="text" name="espaco_latidude" class="form-control" placeholder="Ex.: -3.130277" 
    value="{{ $espacos->espaco_latidude ?? old('espaco_latidude') }}">
</div>
<div class="form-group">
    <label>Longitude:</label>
    <input type="text" name="espaco_longitude" class="form-control" placeholder="Ex.: -60.023598" 
    value="{{ $espacos->espaco_longitude ?? old('espaco_longitude') }}">
</div>

