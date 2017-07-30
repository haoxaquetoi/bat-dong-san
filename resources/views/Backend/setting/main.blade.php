
@extends('backend.layouts.default')
@section('title', 'Cấu hình hệ thống')
@section('myJs')
<script src="{{ URL::asset('backend/js/setting/settingMainCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/setting/settingInfoCtrl.js') }}"></script>
<script src="{{ URL::asset('backend/js/setting/settingEmailCtrl.js') }}"></script>
<!--service-->
<script src="{{ URL::asset('backend/js/factory/services/settingService.js') }}"></script>
@endsection
@section('content')
<section class="content-header">
    <h1>Cấu hình hệ thống</h1>
</section>
<div class="row" ng-controller="settingMainCtrl">
    <div class="col-md-4">
        <section class="content">
            <div class="box box-primary">
                <div class="box-body">
                    <ul class="sidebar-menu">
                        <li ng-repeat="(code, item) in listSetting " ng-class="(active == code)? 'active':''" ng-click="action.active(code)">
                            <a href="javascript:void(0)">
                                <i class="fa fa-user-circle"></i> <span>@{{item.name}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-8" ng-include="data.urlDetail()"></div>
</div>
@endsection

