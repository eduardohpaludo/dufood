@extends('adminlte::page')

@section('title', "Exibindo plano - $plan->name")

@section('content_header')
    <h1>Exibindo plano - {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome: </strong>{{ $plan->name }}</li>
                <li><strong>Url: </strong>{{ $plan->url }}</li>
                <li><strong>Preço: </strong>R$ {{ number_format($plan->price, 2, ',', '.') }}</li>
                <li><strong>Descrição: </strong>{{ $plan->description }}</li>
            </ul>
            <form action="{{ route('plans.destroy', ['url' => $plan->url]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir o plano?')">Deletar o plano - {{ $plan->name }}</button>
            </form>
        </div>
    </div>
@stop
