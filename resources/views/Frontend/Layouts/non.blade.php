<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">
    <head>
        @includeif('backend.partial._head')
    </head>
    <body ng-app="ngApp" class="@yield('bodyCss')" >
        @yield('content')
        @includeif('backend.partial._foot')
        @yield('myJs')
    </body>
</html>
