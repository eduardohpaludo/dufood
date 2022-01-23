@extends('adminlte::page')

@section('title', "Exibindo perfil - $profile->name")

@section('content_header')
    <h1>Exibindo perfil - {{ $profile->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome: </strong>{{ $profile->name }}</li>
                <li><strong>Descrição: </strong>{{ $profile->description }}</li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('profiles.destroy', ['id' => $profile->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir o perfil?')">Deletar o plano - {{ $profile->name }}</button>
            </form>
        </div>
    </div>
@stop
