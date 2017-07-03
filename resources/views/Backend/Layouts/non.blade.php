<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">
    <head>
        @includeif('backend.partial._default_include')
        @includeif('backend.partial._angular')
        @includeif('backend.partial._css')
        @yield('myCss')
    </head>
    <body ng-app="ngApp" class="@yield('bodyCss')" >
        @yield('content')
        @includeif('backend.partial._default_js')
        @includeif('backend.partial._js')
        @yield('myJs')
    </body>
</html>
