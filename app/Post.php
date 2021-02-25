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
    'body'     
    ] ;

    public function category()
    {
        return $this->belongsTo('App\Category')->withDefault([
            'name' => 'N/a'
        ]);
    }
}

