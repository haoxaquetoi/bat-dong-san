
@extends('Backend.Layouts.default')
@section('title', 'Quản lý menu')
@section('myJs')
<script>
    
</script>
<script src="{{ URL::asset('backend/js/factory/services/menuService.js') }}"></script>
<script src="{{ URL::asset('backend/js/factory/services/categoryService.js') }}"></script>
<script src="{{ URL::asset('backend/js/factory/services/articleService.js') }}"></script>
<script src="{{ URL::asset('backend/js/route/menuRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/menu/menuListCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/menu/menuSingleCtrl.js') }}"></script>
@endsection
@section('content')
<div ng-view></div>
@endsection

