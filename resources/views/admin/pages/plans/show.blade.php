@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <h1>Exibindo plano - {{ $plan['name'] }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="" class="form" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $plan['name'] }}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="text" class="form-control" name="price" id="price">
                  </div>
                  <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
            
        </div>
    </div>
@stop
