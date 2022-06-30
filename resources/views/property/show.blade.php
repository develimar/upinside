<h1>Pagina Single</h1>

@if(!empty($property))
    @foreach($property as $prop)
        <h2>Titulo do imovel: {{$prop->title}}</h2>
        <p>Descrição: {{$prop->description}}</p>
        <p>Valor de Aluguel: R$ {{number_format($prop->rental_price,2,',','.')}}</p>
        <p>Valor de Venda: R$ {{number_format($prop->sale_price,2,',','.')}}</p>
    @endforeach
@endif


