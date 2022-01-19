@csrf

@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $detail->name ?? old('name') }}">
</div>

<button type="submit" class="btn btn-primary">Salvar</button>
