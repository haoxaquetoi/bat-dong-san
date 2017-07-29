<angular>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách câu hỏi góp ý <button class="btn btn-primary" ng-click="action.showModal('0');">Thêm mới</button>
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
                                <div class="col-xs-9 padding-bottom-5">
                                    <form class="form-inline" role="form">
                                        <select class="form-control">
                                            <option value="">--Tất cả--</option>
                                            <option value="">--feedback1--</option>
                                            <option value="">--feedback2--</option>
                                        </select>
                                        <button type="button" class="btn btn-default btn-sm">Lọc</button>
                                    </form>
                                </div>
                                <div class="col-md-3 col-xs-12 padding-bottom-5">
                                    <div class="box-tools pull-right">
                                        <div class="input-group input-group-sm" style="width: 250px;">
                                            <input type="text" name="table_search" ng-enter="action.changePage(1)" ng-model="data.feedback.filter.freeText" class="form-control pull-right" placeholder="Tìm kiếm">
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
                                            <col width='17%' />
                                            <col width='17%' />
                                        </colgroup>
                                        <thead>
                                            <tr role="row">
                                                <th>STT</th>
                                                <th>#</th>
                                                <th>Tiêu đề</th>
                                                <th class="sorting_asc">Thứ tự hiển thị</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in data.feedback.list">
                                                <td class="text-center">@{{(data.feedback.filter.page - 1) * data.feedback.filter.pageSize + $index + 1}}</td>
                                                <td class="tbl-actions text-center">
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="javascript:void(0);"  ng-click="action.showModal(item.id);">Chi tiết</a></li>
                                                            <li><a href="javascript:void(0);" ng-click="action.delete(item.id)">Xóa</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" ng-click="action.showModal(item.id);">@{{item.name}}</a>
                                                </td>
                                                <td class="text-center">
                                                    @{{item.order}}
                                                </td>
                                                <td class="text-center" ng-bind="(item.status == 1) ? 'Hoạt động' : 'Không hoạt động'">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <paging
                                        page="data.feedback.filter.page" 
                                        total="data.feedback.total"
                                        page-size="data.feedback.filter.pageSize"
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
    @include('backend.settingFeedback.modalSettingFeedback')
</angular>

