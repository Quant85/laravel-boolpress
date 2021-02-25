<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //dammi un file json
    //restituiscimi una risposta in formato json
        return response()->json([
            //che cosa voglio mostrare
            'success' => true,
            'resources' => Category::all()
        ], 200);
    }
}
