<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">
    <head>

        @includeif('backend.partial._default_include')
        @includeif('backend.partial._angular')
        @includeif('backend.partial._css')
        @yield('myCss')
        <script>
            var SiteUrl = '{{url("/")}}';
        </script>
    </head>
    <body ng-app="ngApp" class="hold-transition skin-blue sidebar-mini" >
        <header class="main-header">
            @includeif('backend.partial._header')
        </header>
        <aside class="main-sidebar">
            @includeif('backend.partial._left_sidebar')
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        @includeif('backend.partial._default_js')
        @includeif('backend.partial._js')
        @yield('myJs')
        @includeif('backend.partial._default_modal')
        @includeif('backend.partial._foot')
        
    </body>
</html>
