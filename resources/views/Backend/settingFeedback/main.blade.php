
@extends('Backend.Layouts.default')
@section('title', 'Quản lý cấu hình câu hỏi góp ý')
@section('myJs')
<script src="{{ URL::asset('backend/js/route/settingFeedbackRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/factory/services/feedbackService.js') }}"></script>
<script src="{{ URL::asset('backend/js/settingFeedback/settingFeedbackListCtrl.js') }}"></script>
@endsection
@section('content')
<div ng-view></div>
@endsection

