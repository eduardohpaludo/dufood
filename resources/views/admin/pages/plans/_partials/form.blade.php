@include('admin.includes.alerts')
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $plan->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="price">Preço</label>
    <input type="text" class="form-control" name="price" id="price" value="{{ $plan->price ?? old('price') }}">
</div>
<div class="form-group">
    <label for="description">Descrição</label>
    <textarea class="form-control" name="description" id="description" rows="3">{{ $plan->description ?? old('description') }}</textarea>
</div>
<button type="submit" class="btn btn-primary">Salvar</button>
