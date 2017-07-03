@extends('backend.layouts.default')
@section('title', 'Quản lý người dùng')
@section('content')

@push('scripts')
<script src="{{url('backend')}}/js/factory/services/ouService.js"></script>
<script src="{{url('backend')}}/js/user/userListCtrl.js"></script>
@endpush
<style>
    #list-user-left{
        background: white  ;
        padding: 10px;
    }
    #list-user-left li
    {
        list-style-type: none;
    }
</style>

<angular ng-controller="userListCtrl" ng-cloak="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách người dùng
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-9 col-xs-offset-3">
                <h1>
                    <button class="btn btn-primary" ng-click="actions.showModalSingleUser('#modalEditUser')" ><i class="fa fa-plus"></i>&nbsp;Thêm người dùng</button>
                    <button class="btn btn-primary" ng-click="actions.singleOu('#modelSingleOu')" ><i class="fa fa-plus"></i>&nbsp;Thêm đơn vị</button>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">

                <ul id="list-user-left">
                    <li ng-click="actions.chooseOu()" ><a href="#" ng-click="actions.chooseOu(ou)" >[Danh sách đơn vị]</a></a></li>
                    <li ng-repeat="ou in data.ou"><a href="#" ng-click="actions.chooseOu(ou)" >@{{ou.name}}</a></li>
                </ul>

            </div>
            <div class="col-xs-9">
                <div class="box">
                    <div class="box-body">
                        <div class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table  class="table table-bordered table-hover dataTable" role="grid" >
                                        <colgroup>
                                            <col width='5%' />
                                            <col width='5%' />
                                            <col width='*' />
                                            <col width='20%' />
                                            <col width='17%' />
                                            <col width='17%' />
                                            <col width='15%' />
                                        </colgroup>
                                        <thead>
                                            <tr role="row">
                                                <th>STT</th>
                                                <th>#</th>
                                                <th>Tên mô tả</th>
                                                <th>Trạng thái</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr role="row" class="odd" ng-repeat="ou in data.ouChildren">
                                                <td >@{{$index + 1}}</td>

                                                <td class="tbl-actions center">
                                                    <div class="dropdown">
                                                        <a href="javascript:;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="javascript:;" ng-click="actions.singleOu('#modelSingleOu', ou)">Chi tiết</a></li>
                                                            <li><a href="javascript:;" ng-click="actions.trashUser(ou.id)">Xóa</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:;" ng-click="actions.chooseOu(ou)"><i class="fa fa-home"></i> &nbsp;@{{ou.name}}</a>
                                                </td>
                                                <td>@{{(ou.deleted ==1) ? 'Hoạt động' :'Không hoạt động'}}</td>
                                            </tr>
                                            <tr role="row" class="odd" ng-repeat="user in data.users">
                                                <td >@{{$index + 1}}</td>
                                                <td class="tbl-actions center">
                                                    <div class="dropdown">
                                                        <a href="javascript:;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="javascript:;" ng-click="actions.showModalSingleUser('#modalEditUser', user)">Chi tiết</a></li>
                                                            <li><a href="javascript:;" ng-click="actions.trashUser(user.id)">Xóa</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <i class="fa fa-user"></i> &nbsp;@{{user.name}}
                                                </td>
                                                <td>@{{(user.active ==1) ? 'Hoạt động' :'Không hoạt động'}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    @include('backend.user.modelSingleOu')
    @include('backend.user.modalEditUser')
</angular>
@endsection

