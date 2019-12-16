@extends('layouts.myapp')

@section('content')
    <!-- Cab -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('categorias.index')}}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalhe</li>
        </ol>
    </nav>
    <!-- Cab -->
    <div class="row">
        <div class="col-md-9">
            <h1>Categoria Detalhe</h1>
        </div>
        <div class="col-md-3">
            <a href="{{route('categorias.edit',$categoria->id)}}" class="btn btn-block btn-primary">Editar</a>
        </div>
    </div>
    <!--- Mostra Categoria -->
    <div class="alert alert-dark" role="alert">
        <span class="badge badge-secondary"><h5>{{$categoria->categoria}}</h5></span>
    </div>
    <p>{{count($categoria->posts)}} posts</p>
    <!--- Mostra Posts da categoria -->
    @if (count($categoria->posts)>0)
        <ul class="list-group">
            @foreach ($categoria->posts as $post)
                <li class="list-group-item">{{$post->titulo}}</li>
            @endforeach
        </ul>
    @else
        <form action="{{route('categorias.destroy',$categoria->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Apagar Categoria" class="btn btn-sn btn-danger">
        </form>
    @endif
@endsection