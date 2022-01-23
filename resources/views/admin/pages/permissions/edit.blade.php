@extends('adminlte::page')

@section('title', "Editando permissão - {$permission->name}")

@section('content_header')
    <h1>Editando permissão - {{ $permission->name }}</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.edit', ['id' => $permission->id]) }}">Editar</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', ['id' => $permission->id]) }}" class="form" method="post">
                @method('put')
                @include('admin.pages.permissions._partials.form')
            </form>

        </div>
    </div>
@stop
