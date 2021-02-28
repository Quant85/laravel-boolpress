<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    //
    public function index()
    {
        # code...
        return response()->json([
            'success' => true,
            'resources' => Tag::all()
        ], 200);
    }
}
