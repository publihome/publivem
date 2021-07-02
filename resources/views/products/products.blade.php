
@extends('template.layout')
@section('content')
<h2 class="text-center">{{strtoupper($categoryName[0])}}</h2>

<div class="table mt-3" id="table">
    <table class="table">
        <thead class="table-dark" >
          <tr id="tr">
           
          </tr>
        </thead>
        <tbody id="tBody">
          
        </tbody>
      </table>
</div>

<div class="btn-add">
    <button class="btn btn-success rounded-circle" data-bs-toggle="modal" data-bs-target="#modalForm" id="btn_add">+</button>
</div>

@include('template.modal')
@endsection
