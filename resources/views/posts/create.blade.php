@extends('layouts.myapp')

@section('content')
    <!-- Cab -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Novo</li>
        </ol>
    </nav>
    <!-- Cab -->
    <div class="row">
        <div class="col-md-9">
            <h1>Post Novo</h1>
        </div>
        <div class="col-md-3">
            
        </div>
    </div>
    <!--- Form de recolha -->
    <form action="{{route('posts.store')}}" method="post">
        @csrf
        
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
            " id="titulo" name="titulo" value="{{old('titulo')}}">
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
                {{old('lead')}}
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
                {{old('corpo')}}
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
                <option value="0">Selecione uma categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}" 
                        @if ($categoria->id == old('categoria_id')) 
                            selected 
                        @endif>
                        {{$categoria->categoria}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
        <label for="tag">Tags <small>Use o CTRL para selecionar várias</small> Old {{old('tags[]')}}</label>
            <select multiple class="form-control" name="tags[]">
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->tag}}</option>
                @endforeach
            </select>
        </div>
        
        
        <input type="submit" value="Confirmar" class="btn btn-sm btn-success">
    </form>
@endsection