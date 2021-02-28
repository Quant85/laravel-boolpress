
@extends('layout.template')
@section('meta')
    @include('pages.partial.common.meta')
@endsection

@section('link-font')
    @include('pages.partial.common.link_font')
@endsection

@section('other-link')
    {{-- in caso di collegamenti a librerie cdn o altro --}}
@endsection

@section('link-css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection
@section('site-title')
    Franca Blog
@endsection

@section('page-title')
    Admin Panel
@endsection

@section('header')
    @include('pages.partial.common.navbar')
@endsection
@section('main')
  <main id="panel-main">
    
    <aside class="btn-controller">
        <a class="dropdown-item {{Route::currentRouteName() ==='panel.index' ?  'active' : (Route::currentRouteName() ==='search' ? 'active' :'')}}" href="{{ route('panel.index')}}" class="btn btn-primary">Panel Control </a>
        <a class="dropdown-item {{Route::currentRouteName() ==='category.index' ? 'active' :''}}" href="{{ route('category.index')}}" class="btn btn-primary">Category</a>
        <a class="dropdown-item {{Route::currentRouteName() ==='tag.index' ? 'active' :''}}" href="{{ route('tag.index')}}" class="btn btn-primary">Tag</a>
    </aside>
    <div class="row container">
      <div class="col-sm-12">
        <h1 class="display-3">Admin Panel Posts</h1>  
        
        {{-- Search section --}}
        <section class="search-section">
          <form action="{{url('search')}}" method="post">
            @csrf
            <br>
            <div class="container">
              <div class="row">
                <div class="container-fluid">
                  <div class="form-group row">
                    <label for="date" class="col-form-label col-sm-2">Created from</label>
                    <div class="col-sm3">
                      <input type="date" class="form-control input-sm" id="fromCreated" name="fromCreated" required>
                    </div>
                    <label for="date" class="col-form-label col-sm-2">Created to</label>
                    <div class="col-sm3">
                      <input type="date" class="form-control input-sm" id="toCreated" name="toCreated" required>
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn" name="search" title="Search"><img class="icon" src="https://img.icons8.com/search"> </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <a class="refresh" href="{{ route('panel.index')}}" class="btn btn-primary"><img class="icon" src="https://img.icons8.com/nolan/2x/refresh.png" alt=""> </a>
        </section>
        <!-- /.search-section -->

        <div>
          <a style="margin: 19px;" href="{{ route('panel.create')}}" class="btn btn-primary">New post</a>
        </div>
        
        
        @foreach($posts as $post)
        <table class="table table-striped">
          <thead>
              <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Subtitle</td>
                <td>URL Img</td>
                <td>Body</td>
                <td>Tag</td>
                <td>Category Id</td>
                <td>Category Name</td>
                <td>Adult</td>
                <td colspan = 2>Actions</td>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->subtitle}}</td>
                  <td>{{$post->img}}</td>
                  <td>{{$post->body}}</td>
                  <td class="tag-post">
                    @if (count($post->tags) > 0 )
                      @foreach ($post->tags as $tag)
                        <span class="tag"> {{$tag->name}} </span>                      
                      @endforeach
                      @else
                        N/a
                    @endif
                  </td>
                  <td>{{optional($post->category)->id}}</td>
                  <td>{{optional($post->category)->name}}</td>
                  <td>{{optional($post->category)->adult ? 'Yes' : 'No'}}</td>
                  <td>
                      <a href="{{ route('panel.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                  </td>
                  <td>
                    <a href="{{ route('panel.show',$post->id)}}" class="btn btn-primary">Show</a>
                  </td>
                 {{--  <td>
                      <form action="{{ route('panel.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
                  </td> --}}

                  {{-- Botton trigger Modal --}}
                  <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy-{{$post->id}}">Delete</button>
                  </td>
                  {{-- Start Add Modal -  --}}
                  <div class="modal fade" id="destroy-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="post-destroy-{{$post->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="#destroy-{{$post->id}} title">Delete Post</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          🚨 Sei sicuro di volerlo cancellare? 🚨 <br> 🚨 E se poi te ne penti?! 🚨
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="{{ route('panel.destroy', $post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- End Add Model --}}
                </tr>
            </tbody>
          </table>
          @endforeach
      <div>
    </div>
    <div class="col-sm-12">

      @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div>
      @endif
    </div>
  </main>
@endsection

@section('footer')
<footer>
  <script src="{{asset('js/app.js')}}"></script>
</footer>
@endsection