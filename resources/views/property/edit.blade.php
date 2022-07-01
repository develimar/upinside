@extends('property.master')

@section('content')
    <div class="container my-3">
<h1>Formulario de Edição::Imoveis</h1>
<?php
$property = $property[0];
?>
<form action="{{url('/imoveis/update',['id' => $property->id])}}" method="post">
    @csrf
    @method('PUT')

        <div class="form-group">
    <labe for="title">Titulo do Imovel</labe>
    <input type="text" name="title" id="title" value="{{$property->title}}" class="form-control">
</div>

    <div class="form-group">
    <labe for="description">Descrição</labe>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$property->description}}</textarea>
</div>

    <div class="form-group">
    <labe for="rental_price">Preço de Aluguel</labe>
    <input type="text" name="rental_price" id="rental_price" value="{{$property->rental_price}}" class="form-control">
</div>

    <div class="form-group">
    <labe for="sale_price">Preço de Venda</labe>
    <input type="text" name="sale_price" id="sale_price" value="{{$property->sale_price}}" class="form-control">
</div>


    <button type="submit" class="btn btn-outline-primary mt-3">Editar Imovel</button>

</form>
    </div>
@endsection
