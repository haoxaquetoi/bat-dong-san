

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thông tin người sử dụng</h4>
            </div>


            <div class="modal-body">
                <div class="form-group" ng-class="actions.hasError('name') ? 'has-error' : ''">
                    <label for="name">Họ tên<span class="text-red">*</span></label>
                    <input type="text" class="form-control" id="name" placeholder="Họ và tên" ng-model="data.users.userInfoSelected.name" >
                    <span class="help-block">@{{actions.showError('name')}}</span>
                </div>
                <div class="form-group" ng-class="actions.hasError('email') ? 'has-error' : ''">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="job_title" placeholder="email" ng-model="data.users.userInfoSelected.email">
                    <span class="help-block">@{{actions.showError('email')}}</span>
                </div>



                <div ng-show="!data.users.userInfoSelected.id || data.users.userInfoSelected.changePassWord">


                    <div class="form-group" ng-class="actions.hasError('password') ? 'has-error' : ''">
                        <label for="password">Mật khẩu <span class="text-red">*</span></label>
                        <input type="password" class="form-control" id="password" placeholder="Mật khẩu" ng-model="data.users.userInfoSelected.password">
                        <span class="help-block">@{{actions.showError('password')}}</span>
                    </div>
                    <div class="form-group" ng-class="actions.hasError('confirm_password') ? 'has-error' : ''">
                        <label for="confirm_password">Mật khẩu <span class="text-red">*</span></label>
                        <input type="password" class="form-control" id="confirm_password" placeholder="Xác nhận mật khẩu" ng-model="data.users.userInfoSelected.confirm_password">
                        <span class="help-block">@{{actions.showError('confirm_password')}}</span>
                    </div>
                </div>


                <div class="form-group" ng-class="actions.hasError('job_title') ? 'has-error' : ''">
                    <label for="job_title">Chức vụ</label>
                    <input type="text" class="form-control" id="job_title" placeholder="Chức vụ"  ng-model="data.users.userInfoSelected.job_title">
                    <span class="help-block">@{{actions.showError('job_title')}}</span>
                </div>
                <div class="form-group" ng-class="actions.hasError('phone') ? 'has-error' : ''">
                    <label for="job_title">Điện thoại</label>
                    <input type="text" class="form-control" id="job_title" placeholder="Điện thoại" ng-model="data.users.userInfoSelected.phone">
                    <span class="help-block">@{{actions.showError('phone')}}</span>
                </div>
                <div class="form-group" ng-class="actions.hasError('phone') ? 'has-error' : ''">
                    <label class="col-xs-3"><input type="radio" ng-value="1" name="rdActive" ng-model="data.users.userInfoSelected.active"   /> Hoạt động</label>
                    <label class="col-xs-9"><input type="radio" ng-value="0" name="rdActive"  ng-model="data.users.userInfoSelected.active" /> Không hoạt động</label>
                </div>
                <div ng-show="data.users.userInfoSelected.id">
                    <a href="javascript:void();" ng-show="!data.users.userInfoSelected.changePassWord" ng-click="data.users.userInfoSelected.changePassWord = true" >Đổi mật khẩu</a>
                    <a href="javascript:void();" ng-show="data.users.userInfoSelected.changePassWord" ng-click="data.users.userInfoSelected.changePassWord = false" >Hủy đổi mật khẩu</a>
                </div>
                <div class="clearfix"></div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-primary" ng-show="data.users.userInfoSelected.id" ng-click="actions.updateUser('#modalEditUser')" ><i class="fa fa-save"></i>&nbsp;Cập nhật</button>
                <button type="button" class="btn btn-primary" ng-show="!data.users.userInfoSelected.id" ng-click="actions.addNewUser('#modalEditUser')" ><i class="fa fa-save"></i>&nbsp;Thêm mới</button>
                <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close" ><i class="fa fa-close"></i>&nbsp;Đóng</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
