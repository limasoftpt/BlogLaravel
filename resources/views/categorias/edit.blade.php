@extends('layouts.myapp')

@section('content')
    <!-- Cab -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('categorias.index')}}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
    <!-- Cab -->
    <div class="row">
        <div class="col-md-9">
            <h1>Categoria Editar</h1>
        </div>
        <div class="col-md-3">
            
        </div>
    </div>
    <!--- Form de recolha -->
    <form action="{{route('categorias.update',$categoria->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" class="form-control
            @if ($errors->any())
                @if ($errors->has('categoria'))
                    is-invalid
                @else
                    is-valid
                @endif
            @endif
            " id="categoria" name="categoria" value="{{$categoria->categoria}}">
            @error('categoria')
                <div class="invalid-feedback">
                    {{ $message }}.
                </div>
            @enderror
        </div>
        <input type="submit" value="Confirmar" class="btn btn-sm btn-success">
    </form>
@endsection