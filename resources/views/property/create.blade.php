@extends('property.master')

@section('content')

<h1>Formulario de Cadastro::Imoveis</h1>


<form action="{{url('/imoveis/store')}}" method="post">
    @csrf

    <labe for="title">Titulo do Imovel</labe>
    <input type="text" name="title" id="title">

    <br />

    <labe for="description">Descrição</labe>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>

    <br />

    <labe for="rental_price">Preço de Aluguel</labe>
    <input type="text" name="rental_price" id="rental_price">

    <br />

    <labe for="sale_price">Preço de Venda</labe>
    <input type="text" name="sale_price" id="sale_price">

    <br />

    <button type="submit">Cadastrar Imovel</button>

</form>
@endsection
