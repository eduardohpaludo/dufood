@extends('adminlte::page')

@section('title', "Editando Plano - $plan->name")

@section('content_header')
    <h1>Editando Plano - {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', ['url' => $plan->url]) }}" class="form" method="post">
                @method('PUT')
                @include('admin.pages.plans._partials.form')
            </form>

        </div>
    </div>
@stop
