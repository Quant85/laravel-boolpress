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
    BoolPress
@endsection

@section('page-title')
    Home
@endsection

@section('header')
    @include('pages.partial.common.header')
@endsection

@section('main')
    @include('pages.categories.main')
@endsection

@section('footer')
    @include('pages.partial.common.footer')
@endsection