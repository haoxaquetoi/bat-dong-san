@extends('Backend.Layouts.default')
@section('title', 'Quản lý chuyên mục')
@section('content')

@push('scripts')

<script src="{{url('backend')}}/js/category/categoryCtrl.js"></script>
<script src="{{url('backend')}}/js/factory/services/categoryService.js"></script>
@endpush


<angular ng-controller="categoryCtrl" ng-cloak="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách chuyên mục
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <h1>
                    <button class="btn btn-primary" ng-click="actions.singleModalCategory('#modalCategory')" ><i class="fa fa-plus"></i>&nbsp;Thêm chuyên mục</button>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
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
                                            <col width='10%' />
                                        </colgroup>
                                        <thead>
                                            <tr role="row">
                                                <th>STT</th>
                                                <th>#</th>
                                                <th>Tên</th>
                                                <th>Trạng thái</th>
                                                <th>Thứ tự</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr role="row" class="odd" ng-repeat="cat in data.categorys">
                                                <td >@{{$index + 1}}</td>
                                                <td class="tbl-actions center">
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="javascript:void(0);" ng-click="actions.singleModalCategory('#modalCategory', cat)">Chi tiết</a></li>
                                                            <li><a href="javascript:void(0);" ng-click="actions.deleteCategory(cat.id)">Xóa</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" ng-click="actions.singleModalCategory('#modalCategory', cat)">@{{cat.children}}&nbsp;@{{cat.name}}</a>
                                                </td>
                                                <td>@{{(cat.status ==1) ? 'Hoạt động' :'Không hoạt động'}}</td>
                                                <td>@{{(cat.order)}}</td>
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
    @include('backend.category.modalCategory')
</angular>
@endsection

