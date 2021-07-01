@extends('template.layout')
@section('content')

<h2 class="text-center mt-3">Gastos</h2>

<table class="table">
    <thead class="table-dark">
      <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Observaciones</th>
          <th>Empleado asignado</th>
          <th>Fecha / Hora</th>
          <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($expenses as $expense)
        <tr>
            <td>#</td>
            <td>{{$expense->name}}</td>
            <td>{{$expense->amount}}</td>
            <td>{{$expense->observations}}</td>
            <td>{{$expense->employeeName . " " . $expense->lastname}}</td>
            <td>{{$expense->created_at}}</td>
            <td>
                <button class="btn btn-warning btn-sm btn-editExpense text-white" id="{{$expense->id}}" data-bs-toggle="modal" data-bs-target="#modalFormExpenses"><i class="fas fa-edit"></i></button>
                <form action="{{url('/expenses/'.$expense->id)}}" method="POST" >
                    @csrf
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger btn-sm" type="submit" ><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
            
        @endforeach
      
    </tbody>
  </table>
  <div class="btn-add">
    <button class="btn btn-success rounded-circle" data-bs-toggle="modal" data-bs-target="#modalFormExpenses" id="btn_add">+</button>
</div>
  @include('expenses.modal')

    
@endsection