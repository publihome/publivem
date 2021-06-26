@extends('template.layout')
@section('content')

<h2 class="text-center mt-3">Categorias</h2>

<div class="row justify-content-around">
    @foreach ($categories as $category)
    <a href="#" class="col-xl-3 nav-link text-dark">
        <div class="card my-4 p-2 text-center">
            <p>{{$category->name}}</p>
        </div>
    </a>
        
    @endforeach
</div>

    
@endsection