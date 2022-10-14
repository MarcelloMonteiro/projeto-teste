@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sistema de cadastro de cliente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Cadastrar um novo cliente</a>
            </div>
        </div>
    </div>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="row">
            <script>
                function mascara(i) {

                    var v = i.value;

                    if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
                        i.value = v.substring(0, v.length - 1);
                        return;
                    }

                    i.setAttribute("maxlength", "14");
                    if (v.length == 3 || v.length == 7) i.value += ".";
                    if (v.length == 11) i.value += "-";

                }
            </script>
            <div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group cpf">
                        <strong>CPF:</strong>
                        <input oninput="mascara(this)" type="text" name="cpf" class="form-control" placeholder="CPF">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group nome">
                        <strong>Nome:</strong>
                        <input type="text" name="nome" class="form-control" placeholder="nome">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group nascimento">
                        <strong>Data de Nascimento:</strong>
                        <input type="date" name="nascimento" class="form-control" placeholder="Data de Nascimento">
                    </div>
                </div>
                <div class="sexo">
                    <strong>Sexo:</strong>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1" value="masculino">
                        <label class="form-check-label" for="inlineRadio1">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="femenino">
                        <label class="form-check-label" for="inlineRadio2">Femenino</label>
                    </div>
                </div>

            </div>
            <div class="estado2">
                <strong>Estado:</strong>
                <select class="form-select" name="estado" aria-label="Default select example">
                    <option selected>Selecionar</option>
                    <option value="SP">SP</option>
                </select>
            </div>
            <div class="cidade2">
                <strong>Cidade:</strong>
                <select class="form-select" name="cidade" aria-label="Default select example">
                    <option selected>Selecionar</option>
                    <option value="São Paulo">São Paulo</option>
                </select>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center botao">
                <button class="btn btn-primary">Pesquisar</button>
            </div>
        </div>

    </form>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>cliente</th>
            <th>CPF</th>
            <th>Data Nasci.</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Sexo</th>
            <th width="280px">Ações</th>
        </tr>
        @foreach ($product as $products)
            <tr>
                {{-- <td>{{ ++$i }}</td> --}}
                <td>{{ $products->nome }}</td>
                <td>{{ $products->cpf }}</td>
                <td>{{ $products->nascimento }}</td>
                <td>{{ $products->estado }}</td>
                <td>{{ $products->cidade }}</td>
                <td>{{ $products->sexo }}</td>
                <td>
                    <form action="{{ route('products.destroy', $products->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('products.show', $products->id) }}">Visualizar </a>

                        <a class="btn btn-primary" href="{{ route('products.edit', $products->id) }}">Editar</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $product->links() !!}
@endsection
