<div class="modal fade" tabindex="-1" role="dialog" id="modalSingleCrawler">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thông tin nguồn lấy tin</h4>
            </div>

            <div class="modal-body" >
                <div class="form-group" ng-class="actions.hasError('website_name') ? 'has-error' : ''">
                    <label for="name">Tên nguồn<span class="text-red">*</span></label>
                    <input type="text" class="form-control" id="name" placeholder="Tên mô tả website cung cấp tin" ng-model="data.singleWebsite.website_name" >
                    <span class="help-block">@{{actions.showError('website_name')}}</span>
                </div>
                <div class="form-group" ng-class="actions.hasError('website_url') ? 'has-error' : ''">
                    <label for="job_title">Địa chỉ nguồn uri<span class="text-red">*</span></label>
                    <input type="text" class="form-control" id="code" placeholder="Nhập đường dẫn Url"  ng-model="data.singleWebsite.website_url">
                    <span class="help-block">@{{actions.showError('website_url')}}</span>
                </div>
                 <div class="form-group text-center" ng-class="actions.hasError('other') ? 'has-error' : ''">
                    <span class="help-block">@{{actions.showError('other')}}</span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" ng-show="!data.singleWebsite.id" ng-click="actions.addNewCrawler('#modalSingleCrawler')" ><i class="fa fa-save"></i>&nbsp;Thêm mới</button>
                <button type="button" class="btn btn-primary" ng-show="data.singleWebsite.id" ng-click="actions.editCrawler('#modalSingleCrawler')" ><i class="fa fa-save"></i>&nbsp;Cập nhật</button>
                <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close" ><i class="fa fa-close"></i>&nbsp;Đóng</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->