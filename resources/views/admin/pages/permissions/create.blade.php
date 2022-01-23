@extends('adminlte::page')

@section('title', "Nova permissão")

@section('content_header')
    <h1>Nova permissão</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.create') }}">Nova</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" class="form" method="post">
                @include('admin.pages.permissions._partials.form')
            </form>

        </div>
    </div>
@stop
