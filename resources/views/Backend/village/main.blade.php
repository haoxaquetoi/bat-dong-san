
@extends('Backend.Layouts.default')
@section('title', 'Quản lý Phường/Xã')
@section('myJs')
<script src="{{ URL::asset('backend/js/route/villageRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/factory/services/addressService.js') }}"></script>
<script src="{{ URL::asset('backend/js/village/villageListCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/village/villageSingleCtrl.js') }}"></script>
@endsection
@section('content')
<div ng-view></div>
@endsection

