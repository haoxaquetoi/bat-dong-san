
<div ng-controller="changeUserInfoCtrl">

    <form action="{{route('editUser')}}" >
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
        <div class="modal fade" tabindex="-1" role="dialog" id="changeUserInfoModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{Auth::user()->name}} - {{Auth::user()->email}}</h4>
                    </div>
                    <div class="modal-body" ng-show="!isEditUser">
                        <div class="form-group clearfix" >
                            <label class="col-sm-3" >Họ tên </label> <span class="col-sm-8">@{{userInfo.name}}</span>
                        </div>
                        <div class="form-group clearfix" >
                            <label  class="col-sm-3">Chức vụ </label><span class="col-sm-8">@{{userInfo.job_title}}</span>
                        </div>
                        <div class="form-group clearfix" >
                            <label class="col-sm-3">Điện thoại</label><span class="col-sm-8">@{{userInfo.phone}}</span>                            
                        </div>
                        <div class="form-group clearfix" >
                            <label class="col-sm-3" >Email</label><span class="col-sm-8">@{{userInfo.email}}</span>
                        </div>
                    </div>

                    <div class="modal-body" ng-show="isEditUser">
                        <div class="form-group" ng-class="actions.hasError('name') ? 'has-error' : ''">
                            <label for="name">Họ tên<span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Họ và tên" ng-model="userInfo.name" >
                            <span class="help-block">@{{actions.showError('name')}}</span>
                        </div>
                        <div class="form-group" ng-class="actions.hasError('job_title') ? 'has-error' : ''">
                            <label for="job_title">Chức vụ</label>
                            <input type="text" class="form-control" id="job_title" placeholder="Chức vụ"  ng-model="userInfo.job_title">
                            <span class="help-block">@{{actions.showError('job_title')}}</span>
                        </div>
                        <div class="form-group" ng-class="actions.hasError('phone') ? 'has-error' : ''">
                            <label for="job_title">Điện thoại</label>
                            <input type="text" class="form-control" id="job_title" placeholder="Điện thoại" ng-model="userInfo.phone">
                            <span class="help-block">@{{actions.showError('phone')}}</span>
                        </div>
                        <div class="form-group" ng-class="actions.hasError('email') ? 'has-error' : ''">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="job_title" placeholder="email" ng-model="userInfo.email">
                            <span class="help-block">@{{actions.showError('email')}}</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" ng-show="!isEditUser" ng-click="isEditUser = true" >Chỉnh sửa</button>
                        <button type="button" class="btn btn-primary" ng-show="isEditUser" ng-click="actions.editUser('#changeUserInfoModal')" >Cập nhật</button>
                        <button type="button" class="btn btn-default"ng-click="actions.cancelChangeUserInfo('#changeUserInfoModal')" >Đóng</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>
</div>