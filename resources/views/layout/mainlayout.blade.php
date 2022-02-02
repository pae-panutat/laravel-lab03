<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @include('layout.partials.head')
     
    </head>
    <body>
        
        @include('layout.partials.nav')
        
        @yield('content')
        
        @include('layout.partials.footer')
        
    </body>
</html>
