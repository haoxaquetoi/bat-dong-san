<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="chosseGroupModal" ng-dom="dom">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Chọn người dùng</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group input-group" >
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search" ng-model="freeText" ng-enter="action.search()">

                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default" ng-click="action.search()"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding: 10px;">
                    <div class="col-sm-12">
                        <table class="table table-hover">
                            <tr>
                                <th><input type="checkbox" ng-model="checkAll" ng-click="action.checkAllGroup(checkAll)"/></th>
                                <th>Tên nhóm</th>
                                <th>Mã</th>
                            </tr>
                            <tr ng-repeat="group in list">
                                <td><input type="checkbox" id="chk_group_@{{group.id}}" ng-model="listChecked[group.id]" ng-change="action.toggleGroup(listChecked[group.id], group)"/> </td>
                                <td><label class="text-normal" for="chk_group_@{{group.id}}">@{{group.name}}</label></td>
                                <td><label class="text-normal" for="chk_group_@{{group.id}}">@{{group.code}}</label> </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-12 text-right" >
                        <paging
                            page="page" 
                            page-size="perPage" 
                            total="total"
                            show-prev-next="true"
                            show-first-last="true">
                        </paging>  
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" ng-click="action.update()">Cập nhật</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
