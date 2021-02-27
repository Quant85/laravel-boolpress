
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
        <a class="dropdown-item {{Route::currentRouteName() ==='panel.index' ? 'active' :''}}" href="{{ route('panel.index')}}" class="btn btn-primary">Panel Control </a>
        <a class="dropdown-item {{Route::currentRouteName() ==='category.index' ? 'active' :''}}" href="{{ route('category.index')}}" class="btn btn-primary">Category</a>
        <a class="dropdown-item {{Route::currentRouteName() ==='tag.index' ? 'active' :''}}" href="{{ route('tag.index')}}" class="btn btn-primary">Tag</a>
    </aside>
    <div class="row container">
      <div class="col-sm-12">
        <h1 class="display-3">Tag Panel Posts</h1>   
        <div>
          <a style="margin: 19px;" href="{{ route('tag.create')}}" class="btn btn-primary">New tag</a>
        </div>          
        @foreach($tags as $tag)
        <table class="table table-striped">
          <thead>
              <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Slug</td>
                <td>Description</td>
                <td colspan = 3>Actions</td>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>{{$tag->id}}</td>
                  <td>{{$tag->name}}</td>
                  <td>{{$tag->slug}}</td>
                  <td>{{$tag->description}}</td>
                  <td>{{$tag->created_at}}</td>
                  <td>{{$tag->updated_at}}</td>
                  <td>
                      <a href="{{ route('tag.edit',$tag->id)}}" class="btn btn-primary">Edit</a>
                  </td>
{{--                   <td>
                    <a href="{{ route('tag.show',$tag->id)}}" class="btn btn-primary">Show</a>
                  </td> --}}
                  <td>
                      <form action="{{ route('tag.destroy', $tag->id)}}" method="post">
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