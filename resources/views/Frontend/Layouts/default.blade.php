<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">
    <head>
        @includeif('Frontend.partial._head')
    </head>
    <body ng-app="ngApp">
        <hr/>
        @includeif('Frontend.partial._header')
        <hr/>
        @yield('content')
        <hr/>
        @includeif('Frontend.partial._right_sidebar')
        <hr/>
        @includeif('Frontend.partial._foot')
        @yield('myJs')
    </body>
</html>
