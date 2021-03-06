@extends('adminlte::page')

@section('title', "Detalhes do plano - {$plan->name}")

@section('content_header')
    <h1>Detalhes do plano - {{$plan->name}} - <a href="{{ route('plan.details.create', ['url' => $plan['url']]) }}" class="btn btn-dark">Adicionar</a></h1></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.show', ['url' => $plan['url']]) }}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plan.details.index', ['url' => $plan['url']]) }}">Detalhes</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="120">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($details as $detail)
                    <tr>
                        <td>{{$detail['name']}}</td>
                        <td>
                            <a href="{{ route('plan.details.edit', ['url' => $plan->url, 'id' => $detail->id]) }}" class="btn btn-info" ><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('plan.details.show', ['url' => $plan->url, 'id' => $detail->id]) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $details->appends($filters)->links()!!}
            @else
                {!! $details->links()!!}
            @endif
        </div>
    </div>
@stop
