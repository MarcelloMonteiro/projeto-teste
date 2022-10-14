@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar cliente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Voltar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Opa!</strong> Ocorreram alguns problemas com sua entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group nome2">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" value="{{ $product->nome }}" class="form-control"
                        placeholder="Seu nome">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group cpf2">
                    <strong>CPF:</strong>
                    <input type="text" name="cpf" value="{{ $product->cpf }}" class="form-control"
                        placeholder="Seu cpf">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group nascimento">
                    <strong>Data Nascimento:</strong>
                    <input type="date" name="nascimento" value="{{ $product->nascimento }}" class="form-control">
                </div>
            </div>
            <div class="sexo">
                <strong>Sexo:</strong>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1"
                        value="{{ $product->sexo }}">
                    <label class="form-check-label" for="inlineRadio1">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2"
                        value="{{ $product->sexo }}">
                    <label class="form-check-label" for="inlineRadio2">Femenino</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group endereco">
                    <strong>Endereço:</strong>
                    <input type="text" name="endereco" value="{{ $product->endereco }}"class="form-control"
                        placeholder="Endereço">
                </div>
            </div>
            <div class="estado">
                <strong>Estado:</strong>
                <select class="form-select" name="estado" aria-label="Default select example">
                    <option value="{{ $product->estado }}">São Paulo</option>
                </select>
            </div>
            <div class="cidade">
                <strong>Cidade:</strong>
                <select class="form-select" name="cidade" aria-label="Default select example">
                    <option value="{{ $product->cidade }}">São Paulo</option>
                </select>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
