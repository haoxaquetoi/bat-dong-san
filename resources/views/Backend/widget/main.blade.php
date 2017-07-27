
@extends('backend.layouts.default')
@section('title', 'Quản lý widget')
@section('myCss')
<link rel="stylesheet" href="{{url('backend')}}/css/widget.css">
@endsection
@section('myJs')

<script src="{{ URL::asset('backend/js/route/widgetRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/widget/widgetListCtrl.js') }}"></script>

<!--service-->
<script src="{{ URL::asset('backend/js/factory/services/widgetService.js') }}"></script>
<script src="{{ URL::asset('backend/js/factory/services/menuService.js') }}"></script>

<!--directive-->
<script src="{{ URL::asset('backend/js/directive/widgetTypeImage.js') }}"></script>
<script src="{{ URL::asset('backend/js/directive/widgetTypeAdv.js') }}"></script>
<script src="{{ URL::asset('backend/js/directive/widgetTypeFreeText.js') }}"></script>
<script src="{{ URL::asset('backend/js/directive/widgetTypeMenu.js') }}"></script>

@endsection
@section('content')
<div ng-view></div>
@endsection

