<div ng-controller="groupSingleCtrl">
    <section class="content-header">
        <h1>@{{data.getTitle()}}</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <form class="form-horizontal" ng-dom="generalInfoDom">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin chung</h3>
                        </div>
                        <div class="box-body" >
                            <div class="form-group">
                                <label for="groupName" class="col-sm-2 control-label">Tên nhóm <span class="text-red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="groupName" class="form-control" value="" placeholder="Tên nhóm" ng-model="data.group.info.name" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="groupCode" class="col-sm-2 control-label">Mã nhóm <span class="text-red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="groupCode" class="form-control" value="" placeholder="Mã nhóm" ng-model="data.group.info.code" required pattern="[\w]+"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Phân quyền</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool text-blue" ng-click="action.showChossePermitModal()">
                                <i class="fa fa-plus"></i> Thêm mới
                            </button>
                            <button type="button" class="btn btn-box-tool text-red" ng-click="action.deleteChossePermit()">
                                <i class="fa fa-trash"></i> Xóa
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <tr>
                                <th><input type="checkbox" ng-model="checkAllPermit" ng-click="action.checkAllPermit(checkAllPermit)"/></th>
                                <th>Quyền sử dụng</th>
                            </tr>
                            <tr ng-repeat="(code, name) in data.permit">
                                <td><input type="checkbox" ng-checked="checkAllPermit" ng-model="chossePermit[code]" id="chk_chosse_permit_@{{code}}"/></td>
                                <td><label class="text-normal" for="chk_chosse_permit_@{{code}}">@{{name}}</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Dánh sách người dùng</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool text-blue" ng-click="action.showChosseUserModal()">
                                <i class="fa fa-plus"></i> Thêm mới
                            </button>
                            <button type="button" class="btn btn-box-tool text-red" ng-click="action.deleteChosseUser()">
                                <i class="fa fa-trash"></i> Xóa
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <tr>
                                <th><input type="checkbox" ng-model="checkAll" ng-click="action.userCheckAll(checkAll)"/></th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Điện thoại</th>
                            </tr>
                            <tr ng-repeat="(userID, user) in data.users">
                                <td><input type="checkbox" ng-model="chosseUser[userID]" id="chk_chosse_user_@{{userID}}"/></td>
                                <td><label class="text-normal" for="chk_chosse_user_@{{userID}}">@{{user.name}}</label></td>
                                <td><label class="text-normal" for="chk_chosse_user_@{{userID}}">@{{user.email}}</label></td>
                                <td>@{{user.phone}}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="footer ">
        <div class="col-sm-12 text-right">
            <a class="btn btn-primary" ng-click="action.update()"><i class="fa fa-save"></i> Cập nhật</a>
            <a class="btn btn-default" href="#!/"> Quay lại</a>
        </div>
    </section>
    <chosse-user-modal dom="chosseUserModal" ret-func="action.chosseUser(retVal)" default-data="data.users"></chosse-user-modal>
    <chosse-permit-modal dom="chossePermitModal" ret-func="action.chossePermit(retVal)" default-data="data.permit" ></chosse-permit-modal>
</div>