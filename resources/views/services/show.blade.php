@extends('layouts.app')

@section('content')
<div class="col-8 m-auto ">
    <div class="card ">
        <div class="card-header" style="display: flex; flex-direction: row; justify-content: space-between;">
            <div style="display: flex; flex-direction: row;">
                <div class="badge">
                    <h4>{{$service->id}}</h4>
                </div>
                <h3>- {{$service->produto}}</h3>
            </div>
            @if($service->situacao)
            <button class="btn btn-danger" onclick="ConfirmDelete({{$service->id}})">Deletar</button>
            @else
            <a href="{{url("/update/$service->id")}}">
                <button class="btn btn-warning">Finalizar Serviço</button>
            </a>
            @endif
        </div>
        <div class="card-body">
            <div class="card-text">
                <h4>Cliente: {{$service->nome_cliente}}</h4>
                <h4>Descrição: {{$service->desc}}</h4>

            </div>

        </div>
        @if($service->situacao)
        <a href="{{url('services/list/concluidos')}}" class="btn btn-primary">Voltar</a>
        @else
        <a href="{{url('services')}}" class="btn btn-primary">Voltar</a>
        
        @endif
    </div>
</div>
@endsection