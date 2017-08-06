<div class="modal fade" tabindex="-1" role="dialog" ng-dom="modalPositionMenu">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Vị trí menu</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group" ng-class="actions.hasError('name') ? 'has-error' : ''">
                    <label class="col-sm-4 col-xs-12 control-label" for="title">Tên vị trí <span class="text-danger">*</span></label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text"  name="positionName" class="form-control" ng-model="data.positioInfo.name" />
                        <span class="help-block">@{{actions.showError('name')}}</span>
                    </div>
                </div>
            </div>
         
            <div class="modal-footer">
                <button type="button" ng-show="data.positioInfo.id" class="btn btn-primary" ng-click="actions.editPosition()" ><i class="fa fa-save"></i>&nbsp;Cập nhật</button>
                <button type="button" ng-show="!data.positioInfo.id" class="btn btn-primary" ng-click="actions.addNewPosition()" ><i class="fa fa-save"></i>&nbsp;Thêm mới</button>
                <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close" ><i class="fa fa-close"></i>&nbsp;Hủy bỏ</button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
