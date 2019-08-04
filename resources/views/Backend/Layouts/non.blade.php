<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">
    <head>
        @includeif('Backend.partial._default_include')
        @includeif('Backend.partial._angular')
        @includeif('Backend.partial._css')
        @yield('myCss')
    </head>
    <body ng-app="ngApp" class="@yield('bodyCss')" >
        @yield('content')
        @includeif('Backend.partial._default_js')
        @includeif('Backend.partial._js')
        @yield('myJs')
    </body>
</html>
