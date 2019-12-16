@extends('layouts.myapp')

@section('content')
    <!-- Cab -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Posts</li>
        </ol>
    </nav>
    <!-- Cab -->
    <div class="row">
        <div class="col-md-9">
            <h1>Posts</h1>
        </div>
        <div class="col-md-3">
            <a href="{{route('posts.create')}}" class="btn btn-block btn-primary">Criar Novo</a>
        </div>
    </div>
    <!-- Tabela com as Posts-->
    <table class="table table-sm table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Autor</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tags</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>    
                    <td>{{$post->titulo}}</td>
                    <td>{{$post->user->name}}, <small>{{$post->created_at}}</small></td>
                    <td>{{$post->categoria->categoria}}</td>
                    <td>
                        @foreach ($post->tags as $tag)
                            <span class="badge badge-success">{{$tag->tag}}</span>    
                        @endforeach
                    </td>
                    <td class="text-right">
                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-sm btn-outline-secondary">+</a>
                    </td>
                </tr> 
            @empty
                <tr>
                    <td colspan="4">Ainda sem posts</td>
                </tr>
            @endforelse
            
        </tbody>
    </table>
    

    {{$posts->links()}}
@endsection