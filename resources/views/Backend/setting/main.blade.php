
@extends('backend.layouts.default')
@section('title', 'Quản lý quảng cáo')
@section('myJs')
<script src="{{ URL::asset('backend/js/route/settingRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/setting/settingInfoCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/setting/settingEmailCtrl.js') }}"></script>
@endsection
@section('content')
<div ng-view></div>
@endsection

