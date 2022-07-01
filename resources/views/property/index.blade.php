@extends('property.master')

@section('content')
    <div class="container my-3">
        <h1>Listagem de Produtos</h1>

        @if(!empty($properties))
            <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Valor de Aluguel</th>
                            <th scope="col">Valor de Venda</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                @foreach($properties as $property)
                    <tr>
                        <td>{{$property->title}}</td>
                        <td>R$ {{ number_format($property->rental_price, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($property->sale_price, 2, ',', '.') }}</td>
                        <td><a href="{{url('/imoveis/'. $property->uname)}}" class="btn btn-outline-info btn-sm">Ver Mais</a>
                            <a href="{{url('/imoveis/editar/'. $property->uname)}}" class="btn btn-outline-secondary btn-sm">Editar</a>
                            <a href="{{url('/imoveis/remover/'. $property->uname)}}" class="btn btn-outline-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
