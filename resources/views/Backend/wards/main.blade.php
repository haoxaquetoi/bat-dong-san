
@extends('backend.layouts.default')
@section('title', 'Quản lý Tỉnh/Thành phố')
@section('myJs')
<script src="{{ URL::asset('backend/js/route/wardsRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/wards/wardsListCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/wards/wardsSingleCtrl.js') }}"></script>
@endsection
@section('content')
<div ng-view></div>
@endsection

