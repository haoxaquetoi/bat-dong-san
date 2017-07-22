
@extends('backend.layouts.default')
@section('title', 'Quản lý quảng cáo')
@section('myJs')
<script src="{{ URL::asset('backend/js/route/feedbackRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/feedback/feedbackListCtrl.js') }}"></script>
@endsection
@section('content')
<div ng-view></div>
@endsection

