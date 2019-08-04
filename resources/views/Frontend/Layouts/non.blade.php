<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">
    <head>
        @includeif('Frontend.partial._head')
    </head>
    <body ng-app="ngApp" class="@yield('bodyCss')" >
        @yield('content')
        @includeif('Frontend.partial._foot')
        @yield('myJs')
    </body>
</html>
