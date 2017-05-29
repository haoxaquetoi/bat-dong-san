<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="{{ URL::asset('js/angularjs/angular.min.js') }}"></script>
        <script src="{{ URL::asset('Backend/js/backend.js') }}"></script>
    </head>
    <body ng-app="ngApp">

        <div class="container-fluid">          
            <div class="col-md-12">
                @yield('content')
            </div>

        </div>

    </body>
</html>