
@extends('Backend.Layouts.default')
@section('title', 'Quản lý quảng cáo')
@section('myJs')
<script src="{{ URL::asset('backend/js/route/feedbackRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/factory/services/feedbackService.js') }}"></script>
<script src="{{ URL::asset('backend/js/feedback/feedbackListCtrl.js') }}"></script>
<script>
ngApp.value('$count',<?php echo json_encode($count) ?>);
</script>
@endsection
@section('content')
<div ng-view></div>
@endsection

