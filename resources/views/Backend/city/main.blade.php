
@extends('backend.layouts.default')
@section('title', 'Quản lý Tỉnh/Thành phố')
@section('myJs')
<script src="{{ URL::asset('backend/js/route/cityRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/city/cityListCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/city/citySingleCtrl.js') }}"></script>
@endsection
@section('content')
<div ng-view></div>
@endsection

