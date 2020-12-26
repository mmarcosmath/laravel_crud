@extends('layouts.app')

@section('content')
<div style="display: flex; text-align: center; justify-content: space-between; margin: 20px;">
    <div>
        @if(count($service)>0)
        @if(!$service[0]->situacao)
        <h1 class="">Ordem de Serviço</h1>
        @else
        <h1 class="">Serviços Concluidos</h1>
        @endif
       @endif
    </div>
    <div class="btn">

        <a href="{{url('services')}}">
            <button class="btn btn-warning">Pendentes</button>
        </a>
        <a href="{{url('services/list/concluidos')}}">
            <button class="btn btn-success">Concluidos</button>
        </a>

        <a href="{{url('services/create')}}">
            <button class="btn btn-primary">Cadastrar</button>
        </a>
    </div>
</div>
<div class=" m-auto">
    <table class="table text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Produto</th>
                <th scope="col">Cliente</th>
                <th scope="col">Classificação</th>
                <th scope="col">Situação</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>

            @foreach($service as $services)
            <tr>
                <th scope="row">{{$services->id}}</th>
                <td>{{$services->produto}}</td>
                <td>{{$services->nome_cliente}}</td>
                <td>
                    @if($services->classificacao == 1)
                    <span class="badge bg-success rounded-pill">Normal</span>
                    @elseif($services->classificacao == 2)
                    <span class="badge bg-warning rounded-pill">Mediano</span>
                    @else
                    <span class="badge bg-danger rounded-pill">Critico</span>
                    @endif
                </td>
                <td>
                    @if($services->situacao)
                    <span class="badge bg-success rounded-pill">Concluido</span>
                    @else
                    <span class="badge bg-warning rounded-pill">Pendente</span>
                    @endif
                </td>
                <td>
                    <a href="{{url("services/$services->id")}}">
                        <button class="btn btn-dark">Visualizar</button>
                    </a>

                    <a href="{{url("services/$services->id/edit")}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <button class="btn btn-danger" onclick="ConfirmDelete({{$services->id}})">Deletar</button>
                    @if(!$services->situacao)
                    <a href="{{url("/toogle/$services->id")}}">
                        <button class="btn btn-warning">Finalizar Serviço</button>
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection