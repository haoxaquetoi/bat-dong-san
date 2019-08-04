<div class="modal fade" tabindex="-1" role="dialog" id="modelSingleOu">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thông tin đơn vị</h4>
            </div>
            <div class="modal-body" ng-show="data.singleOu.id && !data.isEditOu">
                <div class="form-group clearfix" >
                    <label class="col-sm-4" >Tên đơn vị/Phòng Ban </label> <span class="col-sm-8">@{{data.singleOu.name}}</span>
                </div>
                <div class="form-group clearfix" >
                    <label  class="col-sm-4">Mã đơn vị </label><span class="col-sm-8">@{{data.singleOu.code}}</span>
                </div>
                <div class="form-group clearfix" >
                    <label class="col-sm-4">Trực thuộc đơn vị</label><span class="col-sm-8">@{{data.singleOu.parent_name}}</span>                            
                </div>
            </div>

            <div class="modal-body" ng-show="!data.singleOu.id || data.isEditOu">
                <div class="form-group" ng-class="actions.hasError('name') ? 'has-error' : ''">
                    <label for="name">Tên đơn vị/Phòng Ban<span class="text-red">*</span></label>
                    <input type="text" class="form-control" id="name" placeholder="Tên đơn vị phòng ban" ng-model="data.singleOu.name" >
                    <span class="help-block">@{{actions.showError('name')}}</span>
                </div>
                <div class="form-group" ng-class="actions.hasError('code') ? 'has-error' : ''">
                    <label for="job_title">Mã đơn vị<span class="text-red">*</span></label>
                    <input type="text" class="form-control" id="code" placeholder="Mã đơn vị/Phòng ban"  ng-model="data.singleOu.code">
                    <span class="help-block">@{{actions.showError('code')}}</span>
                </div>
                <div class="form-group" ng-class="actions.hasError('parent_id') ? 'has-error' : ''">
                    <label for="parent_id">Trực thuộc đơn vị</label>
                    <select class="form-control" id="parent_id" name="parent_id" ng-model="data.singleOu.parent_id">
                        <option  value="0" >-- Chọn đơn vị --</option>
                        <option  ng-repeat="ouInfo in data.ou" value="@{{ouInfo.id}}" >@{{ouInfo.name}}</option>
                    </select>
                    <span class="help-block">@{{actions.showError('parent_id')}}</span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" ng-show="data.singleOu.id && !data.isEditOu" ng-click="data.isEditOu = true" ><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
                <button type="button" class="btn btn-primary" ng-show="!data.singleOu.id" ng-click="actions.addNewOu('#modelSingleOu')" ><i class="fa fa-save"></i>&nbsp;Thêm mới</button>
                <button type="button" class="btn btn-primary" ng-show="data.singleOu.id && data.isEditOu" ng-click="actions.editOu('#modelSingleOu')" ><i class="fa fa-save"></i>&nbsp;Cập nhật</button>
                <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close" ><i class="fa fa-close"></i>&nbsp;Đóng</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->