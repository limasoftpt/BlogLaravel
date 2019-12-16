<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = [
        'categoria','post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
