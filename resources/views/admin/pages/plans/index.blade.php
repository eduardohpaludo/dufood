@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark">Adicionar</a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
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
                        <th>Preço</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{$plan['name']}}</td>
                            <td>R$ {{number_format($plan['price'], 2, ',', '.')}}</td>
                            <td>
                                <a href="{{ route('plan.details.index', ['url' => $plan['url']]) }}" class="btn btn-primary" ><i class="fas fa-info-circle"></i></a>
                                <a href="{{ route('plans.edit', ['url' => $plan['url']]) }}" class="btn btn-info" ><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ route('plans.show', ['url' => $plan['url']]) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $plans->appends($filters)->links()!!}
            @else
                {!! $plans->links()!!}
            @endif
        </div>
    </div>
@stop
