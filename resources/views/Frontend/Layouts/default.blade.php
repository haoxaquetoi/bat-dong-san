<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">
    <head>
        @includeif('Frontend.partial._head')
        @includeif('Frontend.partial._angular')
    </head>
    <body ng-app="ngApp">
        @includeif('Frontend.partial._header')
        
        @yield('content')

        @includeif('Frontend.partial._foot')
        @includeif('Frontend.partial._defaultJs')
        @yield('myJs')
    </body>
</html>
