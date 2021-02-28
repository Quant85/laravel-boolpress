<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    //

    /**
     * Mostra la page di Home e posso passargli eventiali parametri necessari nella home
     */
    public function home()
    {
        return view('pages.home');
    }

    public function post_list()
    {
        return view('pages.blog.blog');
    }

}
