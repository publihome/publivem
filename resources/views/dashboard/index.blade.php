@extends('template.layout')
@section('content')
<div class="container">
    <form id="formDate">
        @csrf
            <div class="d-flex justify-content-center align-items-center">
            <div class="form-group">
                <label for="from">De</label>
                <input type="date" name="from" id="from" class="form-control">
            </div>
            <div class="form-group">
                <label for="to">Hasta</label>
                <input type="date" name="to" id="to" class="form-control">
            </div>
            <button class="btn btn-success btn-sm" type="submit">Obtener</button>
        </div>
        </form>
</div>



dashboard view
    

<script src="{{url('/js/dashboard/dashboard.js')}}"></script>
@endsection