@extends('template.layout')

@section('content')
<h2 class="text-center">Empleados</h2>


    <div class="row">
        @foreach($employees as $employee)
            <div class="col-md-3">
                <a class="card my-4 p-2 list-item">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-warning btn-sm btn-edit" id="{{$employee->id}}" data-bs-toggle="modal" data-bs-target="#modalFormEmployees" ><i class="fas fa-edit"></i></button>
                        <form action="{{url("/employees/".$employee->id)}}" method="post" >
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                    <p>{{$employee->name}}</p>
                    <p>{{$employee->lastname}}</p>
                </a>
            </div>
        @endforeach 
    </div>

    <div class="btn-add">
        <button class="btn btn-success rounded-circle" data-bs-toggle="modal" data-bs-target="#modalFormEmployees" >+</button>
    </div>
    

    @include('employees.employeesModal')
    <script>
        let modalEmployees = document.getElementById("modalFormEmployees")
        const urlEmployees = "http://localhost:8000/api/employees"
        let btn = document.querySelectorAll(".btn-edit"); 
        let selectedId;     

        btn.forEach(element => {
            element.addEventListener("click", (e)=> {
                
                console.log(element.getAttribute("id"))
                selectedId = element.getAttribute("id")
                getDataEmployee()
            })
        });

        function getDataEmployee(){
            fetch(`${urlEmployees}/${selectedId}`)
            .then(response => response.json())
            .then(employee => putDataEmployee(employee))
        }

        function putDataEmployee(data){
            let name = document.getElementById("name").value = data.name
            let lastname = document.getElementById("lastname").value = data.lastname


        }

        



    </script>
@endsection