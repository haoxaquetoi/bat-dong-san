<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">
    <head>
        @includeif('Frontend.partial._head')
    </head>
    <body ng-app="ngApp">
        @includeif('Frontend.partial._header')
        
        @yield('content')

        @includeif('Frontend.partial._foot')
        @yield('myJs')
    </body>
</html>
