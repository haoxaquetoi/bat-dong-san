<angular>
    <section class="content-header">
        <h1>
            Quản lý menu
        </h1>
    </section>
    <section class="content form-magic">
        <form role="form">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Vị trí menu</h3>
                            <div class="box-tools pull-right">
                                <a class="btn padding-right-0" ng-click="actions.singlePositionMenu()"><i class="fa fa-plus"></i> Thêm mới</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row padding-top-15" ng-repeat="position in data.listPosition">
                                <div class="col-xs-12">
                                    <label class="pull-left">
                                        <a ng-class="(data.positioInfo.id == position.id) ? 'red' : ''"  href="javascript:void(0);" ng-click="actions.showListMenu(position)" >@{{position.name}}</a>
                                    </label>
                                    <label class="pull-right">
                                        <a href="javascript:void(0)"  ng-click="actions.singlePositionMenu(position)"  class="padding-5"><i class="fa fa-edit text-primary"></i></a>
                                        <a href="javascript:void(0)" class="padding-5" ng-click="actions.deletePosition(position.id)"><i class="fa fa-trash text-danger"></i></a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </h3>
                            <div class="box-tools pull-right">
                                <a  ng-click="actions.singleMenu(data.positioInfo.id, 0)"  class="btn padding-right-0"><i class="fa fa-plus"></i> Thêm mới</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
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
                                        <th>Tên menu</th>
                                        <th>Loại menu</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" ng-repeat="menu in data.listMenu">
                                        <td class="text-center">@{{$index +1}}</td>
                                        <td class="tbl-actions text-center">
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="javascript:void(0);" ng-click="actions.singleMenu(menu.position_id, menu.id)"  >Chi tiết</a></li>
                                                    <li><a href="javascript:void(0);" ng-click="actions.deleteMenu( menu.id)" >Xóa</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" ng-click="actions.singleMenu(menu.position_id, menu.id)" >@{{menu.split_child}} @{{menu.name}}</a>
                                        </td>
                                        <td>@{{menu.menuTypeText}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </form>
    </section>
    @include('Backend.menu.modalPositionsMenu')
</angular>

