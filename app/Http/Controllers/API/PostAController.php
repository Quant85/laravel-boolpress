<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
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
            'resources' => Post::all()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //elementi di validazione necessari
        $request->validate([
            'title'=>'required',
            'subtitle'=>'required',
            'body'=>'required'
        ]);
        //Qui creeremo il nostro Post
        $post = new Post([
            'title' => $request->get('title'),
            //equivalente di 'title' => request('title')

            'subtitle' => $request->get('subtitle'),
            'img' => $request->get('img'),
            'body' => $request->get('body')
        ]);
        //andiamo a salvare la risorsa appena creata
        $post->save();
        return redirect('/posts')->with('success', 'Post saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title'=>'required',
            'subtitle'=>'required',
            'body'=>'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->subtitle = $request->get('subtitle');
        $post->img = $request->get('img');
        $post->body = $request->get('body');
        $post->save();
        return redirect('/posts')->with('success', 'Post saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
            $post->delete();
            return redirect('/posts')->with('success', 'Post deleted!');
    }
}
