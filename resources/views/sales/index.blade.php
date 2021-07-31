@extends('template.layout')
@section('content')

<h2 class="text-center mt-3">Ventas</h2>


<div class="container">
    <form id="formDate" class="form">
        <div class="d-flex justify-content-center align-items-end">
            <div class="form-group">
                <label for="">De</label>
                <input type="date" name="from" id="from" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Hasta</label>
                <input type="date" name="to" id="to" class="form-control">
            </div>
            <button class="btn btn-success ms-2" type="submit">Obtener</button>
        </div>
    </form>
</div>

<div class="d-flex justify-content-between amount-data">
    <p>Total <span id="total"></span></p>
    <p>Total pagado: <span id="totaladvance" ></span></p>

</div>

<div class="table mt-3" id="table">
    <table class="table">
        <thead class="table-dark" id="thead">
          
        </thead>
        <tbody id="tBody">
          
        </tbody>
      </table>
</div>

<div class="btn-add">
    <a class="btn btn-success rounded-circle" href="{{url('/sales/create')}}">+</a>
</div>

<script src="{{asset('js/sales/sales.js')}}"></script>
@endsection

    