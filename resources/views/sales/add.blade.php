
@extends('template.layout')

@section('content')
    
<h1 class="text-center">Venta</h1>

<form method="post" id="formVenta">
    <div class="row">
        @include('sales.form')
    </div>
 
    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-primary" type="button" id="add">Agregar</button>
        <button class="btn btn-success" type="submit" id="addSale">Realizar venta</button>
    </div>
</form>

<div class="table mt-3" id="table">
    <table class="table">
        <thead class="table-dark" >
          <tr id="tr">
            <th>Nombre</th>
            <th>Tamaño</th>
            <th>Cantidad</th>
            <th>Precio</th>         
            <th>Precio total</th>         
          </tr>
        </thead>
        <tbody id="tBody">
          
        </tbody>
          <tr>
            <th colspan="3"></th>
            <th>total</th>
            <th id="total">0</th>
          </tr>
      </table>
</div>
<script src="{{asset('js/ventasIteraccionDom.js')}}"></script>
<script src="{{asset('js/ventas.js')}}"></script>


@endsection


