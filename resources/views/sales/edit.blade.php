@extends('template.layout')
@section('content')

@foreach ($sales as $sale)
    
<h3 class="text-center"> Numero de order: {{ $sale->order }}</h3>

<div class="row  my-3 head-sale-details" >
    <div class="col-md-8 border border-2">
        <div class="p-3">
            <p><b>Nombre del cliente:</b> {{$sale->client_name}}</p>
            <p><b>Nombre vendedor:</b> {{$sale->name}} {{$sale->lastname}}</p>
            <p class='@if($sale->amount_all != $sale->advance)  text-danger @else text-success @endif' ><b>Total:</b> ${{$sale->amount_all}}</p>
        </div>
    </div>
    <div class="col-md-4 border border-2">
        <div class="p-3 metadata">
            <p><b>Fecha:</b> {{$sale->created_at}}</p>
            <p><b>Ultima actualización:</b> {{$sale->updated_at == null ? $sale->created_at : $sale->updated_at }}</p>
            <p><b>Forma de pago:</b> {{$sale->payment_format}}</p>
            <p><b>Pagado:</b> <span class="@if($sale->amount_all != $sale->advance) text-warning @else text-success @endif">${{$sale->advance}}</span> </p>
        </div>
    </div>
</div>
@include('sales.modal')

@endforeach

<table class="table">
    <thead class="table-dark">
        <tr>
            <th>Nombre Prod</th>
            <th>Price</th>
            <th>Altura</th>
            <th>Heigth</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales_details as $sale_detail)
        <tr>
            <td>{{$sale_detail->name}}</td>
            @if($sale_detail->sides == 1)
                <td> ${{$sale_detail->amount > $sale_detail->pieces_may ? $sale_detail->price_front_may : $sale_detail->price_front_men  }}</td>
            @elseif($sale_detail->sides == 2)
                <td>${{$sale_detail->amount > $sale_detail->pieces_may ? $sale_detail->price_both_sides_may : $sale_detail->price_both_sides_men }}</td>
            @else
                <td>${{$sale_detail->price_men }}</td>
            @endif

            <td>{{$sale_detail->width == 0 ? '-' : $sale_detail->width }}</td>
            <td>{{$sale_detail->heigth == 0 ? '-' : $sale_detail->width}}</td>
            <td>{{$sale_detail->amount}}</td>
                
        </tr>
            @endforeach 
    </tbody>
  </table>

    @if($sale->amount_all != $sale->advance)
    <div class="d-flex justify-content-end my-5">
        <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalSale">Actualizar</button>
    </div>
    @endif

@endsection