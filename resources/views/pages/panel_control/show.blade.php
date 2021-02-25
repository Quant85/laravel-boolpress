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
    Show Post
@endsection

@section('main')
<main class="main-article-card">
  <div class="wrap container article-card">
    <button type="button" class="btn btn-light btn-ms"> 
      <a href="{{ route('panel.index') }}">Return Admin Panel Posts</a> 
    </button>
        <a class="card-link" href="/">
          <article class="blog-card">
            <img class="post-image" src="{{$post->img}}"/>
            <div class="article-details">
              <h2 class="post-title">{{$post->title}}</h2>
              <h3 class="post-subtitle">{{$post->subtitle}}</h3>
              <p class="post-description">{{$post->body}}</p>
            </div>
            <!-- /.article-details -->
          </article>
        </a>
  </div>
</main>
@endsection