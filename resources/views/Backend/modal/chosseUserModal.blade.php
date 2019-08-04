<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="chosseUserModal" ng-dom="dom">
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
                                <th><input type="checkbox" ng-model="checkAll" ng-click="action.checkAllUser(checkAll)"/></th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                            </tr>
                            <tr ng-repeat="user in list">
                                <td><input type="checkbox" id="chk_user_@{{user.id}}" ng-model="listChecked[user.id]" ng-change="action.toggleUser(listChecked[user.id], user)"/> </td>
                                <td><label class="text-normal" for="chk_user_@{{user.id}}">@{{user.name}}</label></td>
                                <td><label class="text-normal" for="chk_user_@{{user.id}}">@{{user.email}}</label> </td>
                                <td>@{{user.phone}} </td>
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
