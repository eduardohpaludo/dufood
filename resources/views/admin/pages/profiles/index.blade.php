@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>Perfis <a href="{{ route('profiles.create') }}" class="btn btn-dark">Adicionar</a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button class="btn btn-dark" type="submit">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{$profile->name}}</td>
                            <td>
                                <a href="" class="btn btn-primary" ><i class="fas fa-info-circle"></i></a>
                                <a href="" class="btn btn-info" ><i class="fas fa-pencil-alt"></i></a>
                                <a href="" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $profiles->appends($filters)->links()!!}
            @else
                {!! $profiles->links()!!}
            @endif
        </div>
    </div>
@stop
