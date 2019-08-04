<angular ng-cloak="">
    <section class="content-header">
        <h1>
            Cập nhật Phường/Xã
        </h1>
        <ol class="breadcrumb">
            <li><a href="#!/"><i class="fa fa-dashboard"></i> Quản lý Phường/Xã</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </section>
    <section class="content  form-magic">
        <form role="form" class="form-horizontal" ng-dom="generalInfoDom">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-xs-12 control-label">Tên Phường/Xã</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" ng-model="data.village.info.name" id="name" required placeholder="Tên Phường/Xã">
                                    <span class="text-danger" ng-show="error.name" ng-repeat ="item in error.name">@{{item}}. </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-xs-12 control-label">Mã Phường/Xã</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" ng-model="data.village.info.code" id="name" required pattern="[\w]+" placeholder="Mã Phường/Xã">
                                    <span class="text-danger" ng-show="error.code" ng-repeat ="item in error.code">@{{item}}. </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-xs-12 control-label">Quận/Huyện</label>
                                <div class="col-sm-4 col-xs-12">
                                    <select class="form-control" ng-model="data.village.info.district_id" required 
                                            ng-options="value.id as value.name for (key, value) in data.district.list">
                                        <option value="">--Chọn Quận/Huyện--</option>
                                    </select>
                                    <span class="text-danger" ng-show="error.district_id" ng-repeat ="item in error.district_id">@{{item}}. </span>
                                </div>
                            </div>
                            <div class="form-group" ng-if="data.village.id <= 0">
                                <label class="col-sm-2 col-xs-12 control-label"></label>
                                <div class="col-sm-4 col-xs-12">
                                    <input  type="checkbox" name="saveAndAddNew" id='saveAndAddNew' class="magic-checkbox" ng-model="data.saveAndAddNew">
                                    <label for="saveAndAddNew" class="padding-right-20" >
                                        Lưu và thêm mới
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="port" class="col-sm-2 col-xs-12 control-label"></label>
                                <div class="col-sm-4 col-xs-12">
                                    <button type="button" class="btn btn-primary" ng-show="data.village.id <= 0" ng-click="action.insert()"><i class="fa fa-edit"></i> Thêm mới</button>
                                    <button type="button" class="btn btn-primary" ng-show="data.village.id > 0" ng-click="action.update()"><i class="fa fa-edit"></i> Cập nhật</button>
                                    <a href="#!/" class="btn btn-primary"><i class="fa fa-reply"></i> Hủy bỏ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</angular>