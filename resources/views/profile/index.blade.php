@extends('template.layout')
@section('content')

<div class="content-profile">
    <h2>Perfil</h2>
    <div class="card-profile">
        <p >Nombre: {{$user->name}} </p>
        <p>Correo Electrónico: {{$user->email}} </p>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditProfile">Editar</button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEditProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalTitle">Agregar cantidad</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('profile/'.$user->id)}}" method="post" >
                @csrf
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" >
                </div>
                <div class="form-group">
                    <label for="">Correo Electronico</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="">password</label>
                    <input type="password" class="form-control" name="password" id="password" >
                </div>    
            </div>
            <div class="modal-footer">
                <button  type="submit" class="btn btn-success">Agregar</button>
            </div>
            </form>
      </div>
    </div>
  </div>
    
@endsection