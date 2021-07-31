@extends('template.layout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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


<div class="container mt-5 d-none" id="dashboard">
    <div class="grid-dashboard">
        <div class="countSales target" id="Conutsales">
            <p class="titleCard">Numero de ventas</p>
            <img src="{{asset('storage/img/dashboard/carshop.png')}}" alt="" class="img-card">
            <div class="content-number content-info">
                <h2 class="number" id="numSales"></h2>
            </div>
        </div>

        <div class="countSales target">
            <p class="titleCard">Total vendido</p>
            <img src="{{asset('storage/img/dashboard/carshop.png')}}" alt="" class="img-card">
            <div class="content-info">
                <div class="content-number">
                    <span class="number text-success" id="allSales"> </span>
                </div>
    
                <div class="content-number">
                    <span class="number text-danger" id="allExpenses"> </span>
                </div>
            </div>
        </div>

        <div class="charSales target">
            <canvas id="charEmployesSales"></canvas>   
        </div>

        <div class="salesChart target">
            <canvas id="salesChart"></canvas>

        </div>

        <div class="productSalesChart target">
            <canvas id="productSalesChart"></canvas>

        </div>
</div>



<script src="{{url('/js/dashboard/charts.js')}}"></script>
<script src="{{url('/js/dashboard/dashboard.js')}}"></script>
@endsection