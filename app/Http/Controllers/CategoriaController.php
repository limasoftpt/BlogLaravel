<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('categorias.index',[
            'categorias' => Categoria::orderBy('categoria')->paginate(10)
        ]);
    }

    public function create()
    {
        return view ('categorias.create');
    }

    public function store()
    {
        Categoria::create($this->val_categoria());
        return redirect (route('categorias.index'))->with('fm-success','Categoria criada com sucesso');
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show')->with(compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit')->with(compact('categoria'));
    }

    public function update(Categoria $categoria)
    {
        $categoria->update($this->val_categoria());
        return redirect (route('categorias.index'))->with('fm-success','Categoria criada com sucesso');
    }

    public function destroy($id)
    {
        Categoria::findOrFail($id)->delete();
        return redirect (route('categorias.index'))->with('fm-success','categoria eliminada com sucesso');
    }

    protected function val_categoria()
    {
        return request()->validate([
            'categoria' => 'required|max:25',
        ]);
    }
}
