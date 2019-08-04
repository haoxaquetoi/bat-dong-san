
@extends('Backend.Layouts.default')
@section('title', 'Quản lý Đường phố')
@section('myJs')
<script src="{{ URL::asset('backend/js/route/streetRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/factory/services/addressService.js') }}"></script>
<script src="{{ URL::asset('backend/js/street/streetListCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/street/streetSingleCtrl.js') }}"></script>
@endsection
@section('content')
<div ng-view></div>
@endsection

