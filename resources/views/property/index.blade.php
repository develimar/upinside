<h1>Listagem de Produtos</h1>

<p><a href="{{ url('/imoveis/novo') }}">Cadastrar novo Imovel</a></p>

@if(!empty($properties))
    <table>
            <tr>
                <td>Titulo</td>
                <td>Valor de Aluguel</td>
                <td>Valor de Venda</td>
                <td>Ações</td>
            </tr>
        @foreach($properties as $property)
            <tr>
                <td>{{$property->title}}</td>
                <td>R$ {{ number_format($property->rental_price, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($property->sale_price, 2, ',', '.') }}</td>
                <td><a href="{{url('/imoveis/'. $property->uname)}}">Ver Mais</a>
                    |<a href="{{url('/imoveis/editar/'. $property->uname)}}">Editar</a>
                    |<a href="{{url('/imoveis/remover/'. $property->uname)}}">Excluir</a></td>
            </tr>
        @endforeach
    </table>
@endif
