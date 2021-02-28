<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
    'title',
    'subtitle',
    'img',
    'body',
    'category_id',
    'created_at'
    ] ;

    public function category()
    {
        return $this->belongsTo('App\Category')->withDefault([
            'name' => 'N/a'
        ]);
    }

    public function tags()
    {
        # code...
        return $this->belongsToMany(Tag::class);
    }
}

