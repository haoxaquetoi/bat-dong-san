@extends('backend.layouts.default')
@section('title', 'Quản lý nhóm')


@push('scripts')

<script src="{{url('backend')}}/js/article/articleCtrl.js"></script>
<script src="{{url('backend')}}/js/factory/services/articleService.js"></script>
@endpush

@section('content')
<angular ng-controller="articleCtrl">
    <div class="col-md-12" style="margin-top: 50px">
        <button type="button" class="btn btn-primary" ng-click="actions.addnewNews()" >Thêm mới tin đăng</button>
        <button type="button" class="btn btn-primary" ng-click="actions.addnewProduct()" >Thêm mới tin BDS</button>
        <button type="button" class="btn btn-primary" ng-click="actions.delete()" >Xóa tin đăng</button>
        <button type="button" class="btn btn-primary" ng-click="actions.edit()" >Sửa tin đăng</button>
    </div>
</angular>
@endsection