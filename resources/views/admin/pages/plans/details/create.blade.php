@extends('adminlte::page')

@section('title', "Novo detalhe para o plano - {{ $plan->name }}")

@section('content_header')
    <h1>Novo detalhe para o plano {{ $plan->name }}</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.show', ['url' => $plan['url']]) }}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plan.details.index', ['url' => $plan['url']]) }}">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plan.details.create', ['url' => $plan['url']]) }}">Novo</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plan.details.store', ['url' => $plan->url]) }}" class="form" method="post">
                @include('admin.pages.plans.details._partials.form')
            </form>

        </div>
    </div>
@stop
