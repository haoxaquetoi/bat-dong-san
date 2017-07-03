@extends('backend.layouts.default')
@section('title', 'Quản lý nhóm')
@section('myJs')
<script src="{{ URL::asset('backend/js/route/groupRoute.js') }}"></script>
<script src="{{ URL::asset('backend/js/group/groupListCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/group/groupSingleCtrl.js') }}"></script>
<!--service-->
<script src="{{ URL::asset('backend/js/factory/services/groupService.js') }}"></script>
<script src="{{ URL::asset('backend/js/factory/services/groupUserService.js') }}"></script>
<script src="{{ URL::asset('backend/js/factory/services/permitService.js') }}"></script>

<!--directive-->
<script src="{{ URL::asset('backend/js/directive/chossePermitModal.js') }}"></script>
<script src="{{ URL::asset('backend/js/directive/chosseUserModal.js') }}"></script>


@endsection
@section('content')
    <div ng-view></div>
@endsection