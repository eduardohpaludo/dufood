@extends('adminlte::page')

@section('title', "Exibindo permissão - $permission->name")

@section('content_header')
    <h1>Exibindo permissão - {{ $permission->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome: </strong>{{ $permission->name }}</li>
                <li><strong>Descrição: </strong>{{ $permission->description }}</li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('permissions.destroy', ['id' => $permission->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir a permissão?')">Deletar a permissão - {{ $permission->name }}</button>
            </form>
        </div>
    </div>
@stop
