
@extends('backend.layouts.default')
@section('title', 'Quản lý Tỉnh/Thành phố')
@section('myJs')
<script src="{{ URL::asset('backend/js/route/streetRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/street/streetListCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/street/streetSingleCtrl.js') }}"></script>
@endsection
@section('content')
<div ng-view></div>
@endsection

