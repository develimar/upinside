@extends('property.master')

@section('content')
<div class="container my-3">
    <h1>Formulario de Cadastro::Imoveis</h1>

    <form action="{{url('/imoveis/store')}}" method="post">
        @csrf
        <div class="form-group">
            <labe for="title">Titulo do Imovel</labe>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <labe for="description">Descrição</labe>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <labe for="rental_price">Preço de Aluguel</labe>
            <input type="text" name="rental_price" id="rental_price" class="form-control">
        </div>

        <div class="form-group">
            <labe for="sale_price">Preço de Venda</labe>
            <input type="text" name="sale_price" id="sale_price" class="form-control">
        </div>

            <button type="submit" class="btn btn-outline-primary mt-3">Cadastrar Imovel</button>

    </form>
</div>
@endsection
