@extends('layouts.app')



@section('content')
<div class="col-8 m-auto ">
    <h1 class="text-center">Editar Serviço</h1>
    <div class="card ">
        <div class="card-body">
            <form name="formEdit" id="formEdit" method="post" action="{{url("services/$service->id")}}">
                @method('PUT')
                @csrf
                <label class="form-label">Produto:</label>
                <input class="form-control" type="text" name="produto" id="produto" value="{{$service->produto ?? ''}}" required><br>
                <label class="form-label">Descrição:</label>
                <input class="form-control" type="text" name="desc" id="desc" value="{{$service->desc ?? ''}}" required><br>
                <label class="form-label">Cliente:</label>
                <input class="form-control" type="text" name="nome_cliente" id="nome_cliente" value="{{$service->nome_cliente ?? ''}}" required><br>
                <select class="form-control" name="classificacao" id="classificacao" required>
                    <option value="">Selecione a classificação</option>
                    <option value="1">Normal</option>
                    <option value="2">Mediano</option>
                    <option value="3">Critico</option>
                </select>
                <br>
                <input class="btn btn-primary" type="submit" value="Concluir">
            </form>
        </div>
    </div>
</div>
@endsection