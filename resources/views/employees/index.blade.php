@extends('template.layout')

@section('content')
<h2 class="text-center">Empleados</h2>


    <div class="row">
        @foreach($employees as $employee)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a class="card my-4 p-2 nav-link text-dark">
                    <div class="d-flex justify-content-end mb-2">
                        <button class="btn btn-warning btn-sm text-white btn-edit" id="{{$employee->id}}" data-bs-toggle="modal" data-bs-target="#modalFormEmployees" ><i class="fas fa-edit"></i></button>
                        <form action="{{url("/employees/".$employee->id)}}" method="post" >
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                    <div class="d-flex flex-row align-items-start justify-content-start border-top p-2 mr-2">
                        <img src="{{asset('storage/img/user.png')}}" alt="" width="100" class="img-responsive rounded-circle mr-2 ">

                        <div class="content ps-2">
                            <p>{{$employee->name}}</p>
                            <p>{{$employee->lastname}}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach 
    </div>

    <div class="btn-add">
        <button class="btn btn-success rounded-circle"  data-bs-toggle="modal" data-bs-target="#modalFormEmployees" >+</button>
    </div>
    

    @include('employees.employeesModal')
  
@endsection