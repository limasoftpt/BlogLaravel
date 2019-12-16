<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'categoria'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
