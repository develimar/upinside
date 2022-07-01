@extends('property.master')

@section('content')
<h1>Formulario de Edição::Imoveis</h1>
<?php
$property = $property[0];
?>
<form action="{{url('/imoveis/update',['id' => $property->id])}}" method="post">
    @csrf
    @method('PUT')

    <labe for="title">Titulo do Imovel</labe>
    <input type="text" name="title" id="title" value="{{$property->title}}">

    <br />

    <labe for="description">Descrição</labe>
    <textarea name="description" id="description" cols="30" rows="10">{{$property->description}}</textarea>

    <br />

    <labe for="rental_price">Preço de Aluguel</labe>
    <input type="text" name="rental_price" id="rental_price" value="{{$property->rental_price}}">

    <br />

    <labe for="sale_price">Preço de Venda</labe>
    <input type="text" name="sale_price" id="sale_price" value="{{$property->sale_price}}">

    <br />

    <button type="submit">Editar Imovel</button>

</form>
@endsection
