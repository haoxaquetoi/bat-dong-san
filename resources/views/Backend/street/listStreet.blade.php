<angular>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách đường phố <a class="btn btn-primary btn-sm" href="#!/single/0"><i class="fa fa-plus"></i>&nbsp;Thêm mới</a>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="dataTables_wrapper dt-bootstrap">
                            <div class="row">
                                <div class="col-md-12 col-xs-12 padding-bottom-5">
                                    <div class="box-tools pull-right">
                                        <div class="input-group input-group-sm" style="width: 250px;">
                                            <input type="text" name="table_search" ng-enter="action.changePage(1)" ng-model="data.street.filter.freeText" class="form-control pull-right" placeholder="Tìm kiếm">
                                            <div class="input-group-btn">
                                                <button type="button" ng-click="action.changePage(1)" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table  class="table table-bordered table-hover dataTable" role="grid" >
                                        <colgroup>
                                            <col width='5%' />
                                            <col width='5%' />
                                            <col width='*' />
                                            <col width='20%' />
                                            <col width='20%' />
                                        </colgroup>
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting">STT</th>
                                                <th>#</th>
                                                <th class="sorting_asc">Tên</th>
                                                <th class="sorting">Mã</th>
                                                <th class="sorting">Phường/Xã</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" ng-repeat="item in data.street.list">
                                                <td class="text-center">@{{(data.street.filter.page - 1) * data.street.filter.pageSize + $index + 1}}</td>
                                                <td class="tbl-actions text-center">
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-bars"></i>
                                                        </a> 
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#!/single/@{{item.id}}">Chi tiết</a></li>
                                                            <li><a href="javascript:void(0);" ng-click="action.delete(item.id)">Xóa</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#!/single/@{{item.id}}">@{{item.name}}</a>
                                                </td>
                                                <td>@{{item.code}}</td>
                                                <td>@{{item.village.name}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <paging
                                        page="data.street.filter.page" 
                                        total="data.street.total"
                                        page-size="data.street.filter.pageSize"
                                        paging-action="action.changePage(page)"
                                        scroll-top="false" 
                                        hide-if-empty="true"
                                        show-prev-next="true"
                                        show-first-last="true"
                                        text-first="Đầu"
                                        text-last="Cuối"
                                        text-next="Sau"
                                        text-prev="Trước">
                                    </paging>
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
</angular>

