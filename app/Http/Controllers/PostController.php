<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts = Post::all();
        $posts = Post::latest()->get();// mette in ordine
        return view('pages.panel_control.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $tags = Tag::all();
        $categories = Category::all();
        return view('pages.panel_control.create', compact('tags','categories'));

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

        //dd($request->all());
        //elementi di validazione necessari
        $validate_date = $request->validate([
            'title'=>'required',
            'subtitle'=>'required',
            'body'=>'required',
            'img'=>'required',
            'category_id' => 'required',
            'tags[]'=>'exists:tags, id'
            ]);

        //dd($validate_date);
        
        //Qui creeremo il nostro Post
        /* $post = new Post([
            'title' => $request->get('title'),
            //equivalente di 'title' => request('title')
            'subtitle' => $request->get('subtitle'),
            'img' => $request->get('img'),
            'body' => $request->get('body'),
            ]); */

        Post::create($validate_date);

        $post = Post::orderBy('id','desc')->first();
        $post->tags()->attach($request->tags);
        //andiamo a salvare la risorsa appena creata
        //$post->save();
        return redirect('/panel')->with('success', 'Post saved!');
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

        return view('pages.panel_control.show', compact('post'));
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
        return view('pages.panel_control.edit', compact('post'));
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
        $post->category()->name =  $request->get('category_name');
        $post->update();
        return redirect('/panel')->with('success', 'Post saved!');
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
        $post->tags()->detach();
            $post->delete();
            return redirect('/panel')->with('success', 'Post deleted!');
    }
}
