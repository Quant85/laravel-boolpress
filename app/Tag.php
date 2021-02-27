<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = [
    'id',
    'name',
    'slug',
    'description'
    ] ;
    public function posts()
    {
        # code...
        return $this->belongsToMany(Post::class);
    }
}
