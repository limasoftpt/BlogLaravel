@extends('layouts.myapp')

@section('content')
    <!-- Cab -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Categorias</li>
        </ol>
    </nav>
    <!-- Cab -->
    <div class="row">
        <div class="col-md-9">
            <h1>Categorias</h1>
        </div>
        <div class="col-md-3">
            <a href="{{route('categorias.create')}}" class="btn btn-block btn-primary">Criar Nova</a>
        </div>
    </div>
    <!-- Tabela com as Categorias-->
    <table class="table table-sm table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Categoria</th>
                <th scope="col">Posts</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categorias as $categoria)
                <tr>
                    <td>{{$categoria->id}}</td>    
                    <td>{{$categoria->categoria}}</td>
                    <td>{{count($categoria->posts)}}</td>
                    <td class="text-right">
                        <a href="{{route('categorias.show',$categoria->id)}}" class="btn btn-sm btn-outline-secondary">+</a>
                    </td>
                </tr> 
            @empty
                <tr>
                    <td colspan="4">Ainda sem categorias</td>
                </tr>
            @endforelse
            
        </tbody>
    </table>
    

    {{$categorias->links()}}
@endsection