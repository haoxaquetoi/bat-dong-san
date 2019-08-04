
@extends('Backend.Layouts.default')
@section('title', 'Quản lý Quận/Huyện')
@section('myJs')
<script src="{{ URL::asset('backend/js/route/districtRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/factory/services/addressService.js') }}"></script>
<script src="{{ URL::asset('backend/js/district/districtListCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/district/districtSingleCtrl.js') }}"></script>
@endsection
@section('content')
<div ng-view></div>
@endsection

