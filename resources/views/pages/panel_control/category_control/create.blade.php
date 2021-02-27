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
    Post Creation Panel
@endsection

@section('main')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a post</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <button type="button" class="btn btn-light btn-ms"> 
        <a href="{{ route('panel.index') }}">Return Admin Panel Posts</a> 
      </button>
      <button type="button" class="btn btn-light btn-ms"> 
        <a href="{{ route('category.index') }}">Return Category Panel</a> 
      </button>
      <form method="post" action="{{ route('category.store') }}" class="needs-validation">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="adult">Adult Category:</label>
              <input type="checkbox" name="adult" class="switch-input" value="1" {{ old('adult') ? 'checked="checked"' : '' }}/>
          </div>

          <div class="form-group">
            <label for="icon">Icon:</label>
            <input type="text" class="form-control" name="icon"/>
          </div>
          <button type="submit" class="btn btn-outline-primary btn-block">Add Category</button>
      </form>
  </div>
</div>
</div>
@endsection