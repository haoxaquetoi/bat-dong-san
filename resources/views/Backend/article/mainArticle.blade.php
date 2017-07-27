@extends('backend.layouts.default')
@section('title', 'Quản lý người dùng')
@section('myJs')
<script src="{{ URL::asset('backend/js/route/articleRoute.js') }}"></script>
<script src="{{url('backend')}}/js/factory/services/articleService.js"></script>
<script src="{{url('backend')}}/js/factory/services/categoryService.js"></script>
<script src="{{ URL::asset('backend/js/article/articleListCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/article/articleSingleNewsCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/article/articleSingleProductCtrl.js') }}"></script>
@endsection
@section('content')
<div ng-view></div>
@endsection

