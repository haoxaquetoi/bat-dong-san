<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">
    <head>

        @includeif('Backend.partial._default_include')
        @includeif('Backend.partial._angular')
        @includeif('Backend.partial._css')
        @yield('myCss')
        <script>
            var SiteUrl = '{{url("/")}}';
        </script>
    </head>
    <body ng-app="ngApp" class="hold-transition skin-blue sidebar-mini" >
        <header class="main-header">
            @includeif('Backend.partial._header')
        </header>
        <aside class="main-sidebar">
            @includeif('Backend.partial._left_sidebar')
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        @includeif('Backend.partial._default_js')
        @includeif('Backend.partial._js')
        @yield('myJs')
        @includeif('Backend.partial._default_modal')
        @includeif('Backend.partial._foot')
        
    </body>
</html>
