
@extends('template.layout')
@section('content')
<h2 class="text-center">{{$categoryName[0]}}</h2>

<div class="btn-add">
    <button class="btn btn-success rounded-circle" data-bs-toggle="modal" data-bs-target="#modalForm" id="btn_add">+</button>

</div>

<div class="table" id="table">

</div>

@include('template.modal')
@endsection


{{-- <script src="{{asset('js/products.js')}}"></script> --}}