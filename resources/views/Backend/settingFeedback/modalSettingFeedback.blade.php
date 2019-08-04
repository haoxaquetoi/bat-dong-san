<div class="modal fade" tabindex="-1" role="dialog" id="modalSettingFeedback">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thông tin chi tiết câu hỏi góp ý</h4>
            </div>
            <div class="modal-body form-horizontal">
                <form ng-dom="generalInfoDom">
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label" for="title">Tiêu đề</label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="text" id="title" name="title" ng-model="data.feedback.info.name" required  class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label" for="order">Thứ tự hiển thị</label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="text" id="order" name="order" ng-model="data.feedback.info.order" required  class="form-control" />
                        </div>
                    </div>
                    <div class="form-group" ng-show="data.feedback.info.id !=1">
                        <label class="col-sm-4 col-xs-12 control-label"></label>
                        <div class="col-sm-8 col-xs-12">
                            <input id="status" type="checkbox" name="status" ng-model="data.feedback.info.status" class="magic-checkbox" />
                            <label for="status" class="padding-right-20">
                                Hoạt động
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" ng-show="data.feedback.id <= 0" ng-click="action.insert()"><i class="fa fa-edit"></i> Thêm mới</button>
                <button type="button" class="btn btn-primary" ng-show="data.feedback.id > 0" ng-click="action.update()"><i class="fa fa-edit"></i> Cập nhật</button>
                <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close" ><i class="fa fa-close"></i>&nbsp;Hủy bỏ</button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
