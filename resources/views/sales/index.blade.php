@extends('template.layout')
@section('content')

<h2 class="text-center mt-3">Ventas</h2>


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

    