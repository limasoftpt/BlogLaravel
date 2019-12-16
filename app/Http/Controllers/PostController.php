<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categoria;
use App\Tag;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create','store']]);
    }

    public function index()
    {
        return view('posts.index',[
            'posts' => Post::orderBy('titulo')->paginate(10)
        ]);
    }

    public function create()
    {
        return view ('posts.create',[
            'categorias' => Categoria::orderBy('categoria')->get(),
            'tags' => Tag::orderBy('tag')->get()
        ]);
    }

    public function store()
    {
        $post = new Post($this->val_post_add());
        $post->user_id = auth()->id();
        $post->save();

        $post->tags()->attach(request('tags'));

        return redirect (route('posts.index'))->with('fm-success','Post criada com sucesso');
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(compact('post'));
    }

    public function edit(Post $post)
    {
        $categorias = Categoria::orderBy('categoria')->get();
        return view('posts.edit')->with(compact('post','categorias','tags'));
    }

    public function update(Post $post)
    {
        $post->update($this->val_post());
        return redirect (route('posts.index'))->with('fm-success','Post criada com sucesso');
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect (route('posts.index'))->with('fm-success','post eliminada com sucesso');
    }

    protected function val_post_add()
    {
        return request()->validate([
            'titulo' => 'required|max:100|unique:posts',
            'lead' => 'required|max:255',
            'corpo' => 'required',
            'categoria_id' => 'required|gt:0',
            'tags' => 'exists:tags,id',
        ]);
    }
    protected function val_post_update()
    {
        return request()->validate([
            'titulo' => 'required|max:100|unique:posts',
            'lead' => 'required|max:255',
            'corpo' => 'required',
            'categoria_id' => 'required|gt:0',
            'tags' => 'exists:tags,id',
        ]);
    }
}
