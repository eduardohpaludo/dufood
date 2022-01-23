@extends('adminlte::page')

@section('title', "Editando perfil - {$profile->name}")

@section('content_header')
    <h1>Editando perfil - {{ $profile->name }}</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.edit', ['id' => $profile->id]) }}">Editar</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', ['id' => $profile->id]) }}" class="form" method="post">
                @method('put')
                @include('admin.pages.profiles._partials.form')
            </form>

        </div>
    </div>
@stop
