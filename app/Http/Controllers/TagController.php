<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('tags.index',[
            'tags' => Tag::orderBy('tag')->paginate(10)
        ]);
    }

    public function create()
    {
        return view ('tags.create');
    }

    public function store()
    {
        Tag::create($this->val_tag());
        return redirect (route('tags.index'))->with('fm-success','Tag criada com sucesso');
    }

    public function show(Tag $tag)
    {
        return view('tags.show')->with(compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit')->with(compact('tag'));
    }

    public function update(Tag $tag)
    {
        $tag->update($this->val_tag());
        return redirect (route('tags.index'))->with('fm-success','Tag criada com sucesso');
    }

    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return redirect (route('tags.index'))->with('fm-success','tag eliminada com sucesso');
    }

    protected function val_tag()
    {
        return request()->validate([
            'tag' => 'required|max:15',
        ]);
    }
}
