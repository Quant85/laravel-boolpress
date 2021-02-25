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
    Editing Panel
@endsection

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a contact</h1>
        <button type="button" class="btn btn-light btn-ms"> 
            <a href="{{ route('panel.index') }}">Return Admin Panel Posts</a> 
        </button>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{route('panel.update', $post->id)}}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="title">Title :</label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}" />
            </div>

            <div class="form-group">
                <label for="subtitle">Subtitle :</label>
                <input type="text" class="form-control" name="subtitle" value="{{$post->subtitle}}" />
            </div>

            <div class="form-group">
                <label for="img">URL Img:</label>
                <input type="text" class="form-control" name="img" value="{{$post->img}}" />
            </div>
            <div class="form-group">
                <label for="body">Body Post:</label>
                <textarea id="validationTextarea" class="form-control " name="body" cols="50" rows="10">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection