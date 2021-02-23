<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @yield('meta')
  
  <title>@yield('site-title') | @yield('page-title')</title>

  @yield('link-font')

  @yield('other-link')
  
  @yield('link-css')
</head>
  <body>
    @yield('header')
    @yield('main')
    @yield('footer')
  </body>
</html>