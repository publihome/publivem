@extends('template.layout')
@section('content')

<h2 class="text-center mt-3">Categorias</h2>

<div class="row justify-content-around">
    @foreach ($categories as $category)
    <a href="{{url('products/category/'.$category->id)}}" class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-6 nav-link text-dark">
        <div class="card card-category my-4 p-2 bg-blue text-center">
            <p>{{$category->name}}</p>
        </div>
    </a>
    @endforeach
</div>

@endsection