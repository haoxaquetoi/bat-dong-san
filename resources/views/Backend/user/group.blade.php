<div ng-controller="groupListCtrl">
    <section class="content-header">
        <h1>Danh sách nhóm</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <a class="btn btn-primary" href="#!/single/0" ><i class="fa fa-plus"></i>&nbsp;Thêm nhóm</a>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm" ng-model="freeText" ng-enter="actions.search()">

                                <div class="input-group-btn">
                                    <button ng-click="actions.search()" type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <tr>
                                <th>STT</th>
                                <th>#</th>
                                <th>Tên nhóm</th>
                                <th>Mã nhóm</th>
                                <th>Số lương thành viên</th>
                            </tr>
                            <tr ng-repeat="item in list">
                                <td>@{{$index + 1}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="javascript:;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="@{{actions.singleUrl(item)}}">
                                                    <i class="fa fa-edit"></i> Chi tiết
                                                </a>
                                            </li>
                                            <li ng-if="item.count_user < 1">
                                                <a href="javascript:;" ng-click="actions.trashGroup(item.id)" class="text-red">
                                                    <i class="fa fa-trash"></i> Xóa
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td><a href="@{{actions.singleUrl(item)}}">@{{item.name}}</a></td>
                                <td>@{{item.code}}</td>
                                <td>@{{item.count_user}}</td>
                            </tr>
                        </table>
                        <div class="col-sm-12 text-right" >
                            <paging
                                page="page" 
                                page-size="pageSize" 
                                total="total"
                                show-prev-next="true"
                                show-first-last="true">
                            </paging>  
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>