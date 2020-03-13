@extends('layouts.myapp')

@section('content')
    <!-- Cab -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mostrar Post</li>
        </ol>
    </nav>
    <!-- Cab -->
    <div class="row">
        <div class="col-md-8">
            <h1>Post Detail</h1>
        </div>
        <div class="col-md-2">
            <form action="{{route('posts.destroy',$post->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Apagar" class="btn btn-block btn-danger">
            </form>
        </div>
        <div class="col-md-2">
            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-block btn-primary">Editar</a>
        </div>
    </div>
    <hr>
    <h1>{{$post->titulo}}</h1>
    <h2>{{$post->lead}}</h2>
    <div class="alert alert-success"><h3>Categoria: {{$post->categoria->categoria}}</h3></div>
    <p>{{$post->corpo}}</p>
    <hr>
    @foreach ($post->tags as $tag)
        <span class="badge badge-success">{{$tag->tag}}</span>    
    @endforeach
    <hr>
    <p class="text-right"><small>Última atualização {{$post->updated_at}}</small></p>

@endsection