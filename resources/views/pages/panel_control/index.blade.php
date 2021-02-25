
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
    <div class="row container">
      <div class="col-sm-12">
        <h1 class="display-3">Admin Panel Posts</h1>   
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
                <td>Category Name</td>
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
                  <td>{{optional($post->category)->name}}</td>
                  <td>
                      <a href="{{ route('panel.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                  </td>
                  <td>
                    <a href="{{ route('panel.show',$post->id)}}" class="btn btn-primary">Show</a>
                  </td>
                  <td>
                      <form action="{{ route('panel.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
                  </td>
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