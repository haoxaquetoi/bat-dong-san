<form name="frmCategory" id="frmCategory" ng-submit="actions.updateCategory('#modalCategory', data.categoryInfo)">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal fade" tabindex="-1" role="dialog" id="modalCategory">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Thông tin chuyên mục</h4>
                </div>


                <div class="modal-body" >




                    <div class="form-group" ng-class="actions.hasError('name') ? 'has-error' : ''">
                        <label for="name">Tên chuyên mục<span class="text-red">*</span></label>
                        <input type="text" required="true" class="form-control" id="name" placeholder="Nhập tên chuyên mục" ng-model="data.categoryInfo.name" >
                        <span class="help-block">@{{actions.showError('name')}}</span>
                    </div>



                    <div class="form-group" ng-class="actions.hasError('slug') ? 'has-error' : ''">
                        <label for="slug">Nhập đường dẫn slug<span class="text-red">*</span></label>
                        <input type="text" required="true" class="form-control" id="slug" placeholder="Nhập đường dẫn slug"  ng-model="data.categoryInfo.slug">
                        <span class="help-block">@{{actions.showError('slug')}}</span>
                    </div>




                    <div class="form-group" ng-class="actions.hasError('parent_id') ? 'has-error' : ''">
                        <label for="slug">Chuyên mục cha</label>
                        <select class="form-control" name="selParent" id="selParent" ng-model="data.categoryInfo.parent_id">
                            <option value="0">-- Chuyên mục cha --</option>
                            <option  ng-repeat="catParent in data.categorys" ng-if="catParent.id != data.categoryInfo.id" ng-value="@{{catParent.id}}" >@{{catParent.children}}&nbsp;@{{catParent.name}}</option>
                        </select>
                        <span class="help-block">@{{actions.showError('parent_id')}}</span>
                    </div>




                    <div class="form-group" ng-class="actions.hasError('type') ? 'has-error' : ''">
                        <label for="type">Loại chuyên mục</label>
                        <input type="text" class="form-control" id="type" placeholder="Loại chuyên mục"  ng-model="data.categoryInfo.type">
                        <span class="help-block">@{{actions.showError('type')}}</span>
                    </div>



                    <div class="form-group" ng-class="actions.hasError('order') ? 'has-error' : ''">
                        <label for="slug"  >Thứ tự hiển thị<span class="text-red">*</span></label>
                        <input type="number" required="true" class="form-control" id="order" placeholder="Thứ tự hiển thị"  ng-model="data.categoryInfo.order">
                        <span class="help-block">@{{actions.showError('order')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="chkStatus" class="col-xs-3">
                            <input type="checkbox" name="status" id="chkStatus" ng-checked="data.categoryInfo.status == '1'" ng-click="data.categoryInfo.status = (data.categoryInfo.status == '1') ? '0' : '1'"  />
                            Hoạt động
                        </label>
                    </div>



                    <div class="form-group text-center" ng-class="actions.hasError('other') ? 'has-error' : ''">
                        <span class="help-block">@{{actions.showError('other')}}</span>
                    </div>



                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i>&nbsp;@{{!data.categoryInfo.id ? 'Thêm mới' :  'Cập nhật'}}</button>
                    <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close" ><i class="fa fa-close"></i>&nbsp;Đóng</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>