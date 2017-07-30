
@extends('backend.layouts.default')
@section('title', 'Quản lý quảng cáo')
@section('myJs')
<script src="{{ URL::asset('backend/js/route/advertisingRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/factory/services/advService.js') }}"></script>
<script src="{{ URL::asset('backend/js/advertising/advertisingListCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/advertising/advertisingSingleCtrl.js') }}"></script>
@endsection
@section('content')
<div ng-view></div>
@endsection

