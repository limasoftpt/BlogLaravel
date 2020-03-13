@extends('layouts.myapp')

@section('content')
    <!-- Cab -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <!-- Cab -->
    <div class="row">
        <div class="col-md-9">
            <h1>Post Edit</h1>
        </div>
        <div class="col-md-3">
            
        </div>
    </div>
    <!--- Form de recolha -->
    <form action="{{route('posts.update',$post->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control
            @if ($errors->any())
                @if ($errors->has('titulo'))
                    is-invalid
                @else
                    is-valid
                @endif
            @endif
            " id="titulo" name="titulo" value="{{$post->titulo}}">
            @error('post')
                <div class="invalid-feedback">
                    {{ $message}}.
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="lead">Lead</label>
            <textarea class="form-control
            @if ($errors->any())
                @if ($errors->has('lead'))
                    is-invalid
                @else
                    is-valid
                @endif
            @endif
            " id="lead" name="lead" rows="2">
                {{$post->lead}}
            </textarea>
            @error('post')
                <div class="invalid-feedback">
                    {{ $message}}.
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="corpo">Corpo</label>
            <textarea class="form-control
            @if ($errors->any())
                @if ($errors->has('corpo'))
                    is-invalid
                @else
                    is-valid
                @endif
            @endif
            " id="corpo" name="corpo" rows="5">
                {{$post->corpo}}
            </textarea>
            @error('post')
                <div class="invalid-feedback">
                    {{ $message}}.
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="categoria_id">Categoria</label>
            <select class="form-control
            @if ($errors->any())
                @if ($errors->has('categoria_id'))
                    is-invalid
                @else
                    is-valid
                @endif
            @endif
            " id="categoria_id" name="categoria_id">
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}" 
                        @if ($categoria->id == $post->categoria_id) 
                            selected 
                        @endif>
                        {{$categoria->categoria}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
        <label for="tag">Tags <small>Use o CTRL para selecionar várias</small></label>
            <select multiple class="form-control" name="tags[]">
                @foreach ($tags as $tag)
                    @if($post->tags->contains($tag->id))
                        <option value="{{$tag->id}}" selected>{{$tag->tag}}</option>
                    @else 
                        <option value="{{$tag->id}}">{{$tag->tag}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        
        
        <input type="submit" value="Confirmar" class="btn btn-sm btn-success">
    </form>
@endsection