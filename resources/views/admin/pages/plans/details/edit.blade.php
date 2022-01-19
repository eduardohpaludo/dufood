@extends('adminlte::page')

@section('title', "Editando detalhe - {{ $detail->name }}")

@section('content_header')
    <h1>Editando detalhe - {{ $detail->name }}</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.show', ['url' => $plan['url']]) }}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plan.details.index', ['url' => $plan['url']]) }}">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plan.details.edit', ['url' => $plan->url, 'id' => $detail->id]) }}">Editar</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plan.details.update', ['url' => $plan->url, 'id' => $detail->id]) }}" class="form" method="post">
                @method('PUT')
                @include('admin.pages.plans.details._partials.form')
            </form>

        </div>
    </div>
@stop
