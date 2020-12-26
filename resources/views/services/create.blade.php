@extends('layouts.app')

@section('content')
<div class="col-8 m-auto ">
    <h1 class="text-center">Novo Serviço</h1>
    <div class="card ">
        <div class="card-body">
            <form name="formCad" id="formCad" method="post" action="{{url('services')}}">
                @csrf
                <label class="form-label">Produto:</label>
                <input class="form-control" type="text" name="produto" id="produto" required><br>
                <label class="form-label">Descrição:</label>
                <input class="form-control" type="text" name="desc" id="desc" required><br>
                <label class="form-label">Cliente:</label>
                <input class="form-control" type="text" name="nome_cliente" id="nome_cliente" required><br>
                <select class="form-control" name="classificacao" id="classificacao" required>
                    <option value="">Selecione a classificação</option>
                    <option value="1">Normal</option>
                    <option value="2">Mediano</option>
                    <option value="3">Critico</option>
                </select>
                <br>
                <input class="btn btn-primary" type="submit" value="Cadastrar">
            </form>
        </div>
    </div>
</div>
@endsection