@extends('layouts.myapp')

@section('content')
    <!-- Cab -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('tags.index')}}">Tags</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalhe</li>
        </ol>
    </nav>
    <!-- Cab -->
    <div class="row">
        <div class="col-md-9">
            <h1>Tag Detalhe</h1>
        </div>
        <div class="col-md-3">
            <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-block btn-primary">Editar</a>
        </div>
    </div>
    <!--- Mostra Tag -->
    <div class="alert alert-dark" role="alert">
        <span class="badge badge-secondary"><h5>{{$tag->tag}}</h5></span>
    </div>
    <p>{{count($tag->posts)}} posts</p>
    <!--- Mostra Posts da tag -->
    @if (count($tag->posts)>0)
        <ul class="list-group">
            @foreach ($tag->posts as $post)
                <li class="list-group-item">{{$post->titulo}}</li>
            @endforeach
        </ul>
    @else
        <form action="{{route('tags.destroy',$tag->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Apagar Tag" class="btn btn-sn btn-danger">
        </form>
    @endif
@endsection