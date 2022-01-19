@extends('adminlte::page')

@section('title', "Exibindo detalhe - $detail->name")

@section('content_header')
    <h1>Exibindo detalhe - {{ $detail->name }}</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.show', ['url' => $plan['url']]) }}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plan.details.index', ['url' => $plan['url']]) }}">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plan.details.edit', ['url' => $plan->url, 'id' => $detail->id]) }}">Detalhe</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome: </strong>{{ $detail->name }}</li>
            </ul>
            <form action="{{ route('plan.details.destroy', ['url' => $plan->url, 'id' => $detail->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir o detalhe?')">Deletar o detalhe - {{ $detail->name }}, do plano {{ $plan->name }}</button>
            </form>
        </div>
    </div>
@stop
