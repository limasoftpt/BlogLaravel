@extends('layouts.myapp')

@section('content')
    <!-- Cab -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('tags.index')}}">Tags</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
    <!-- Cab -->
    <div class="row">
        <div class="col-md-9">
            <h1>Tag Editar</h1>
        </div>
        <div class="col-md-3">
            
        </div>
    </div>
    <!--- Form de recolha -->
    <form action="{{route('tags.update',$tag->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="tag">Tag</label>
            <input type="text" class="form-control
            @if ($errors->any())
                @if ($errors->has('tag'))
                    is-invalid
                @else
                    is-valid
                @endif
            @endif
            " id="tag" name="tag" value="{{$tag->tag}}">
            @error('tag')
                <div class="invalid-feedback">
                    {{ $message }}.
                </div>
            @enderror
        </div>
        <input type="submit" value="Confirmar" class="btn btn-sm btn-success">
    </form>
@endsection