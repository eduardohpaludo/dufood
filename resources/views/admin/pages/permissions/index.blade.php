@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>Permissões <a href="{{ route('permissions.create') }}" class="btn btn-dark">Adicionar</a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button class="btn btn-dark" type="submit">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="250">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{$permission->name}}</td>
                        <td>
                            <a href="{{ route('permissions.edit', ['id' => $permission->id]) }}" class="btn btn-info" ><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('permissions.show', ['id' => $permission->id]) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $permissions->appends($filters)->links()!!}
            @else
                {!! $permissions->links()!!}
            @endif
        </div>
    </div>
@stop
