<angular ng-cloak="">
    <section class="content-header">
        <h1>
            Cập nhật đường phố
        </h1>
        <ol class="breadcrumb">
            <li><a href="#!/"><i class="fa fa-dashboard"></i> Quản lý đường phố</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </section>
    <section class="content  form-magic">
        <form class="form-horizontal" ng-dom="generalInfoDom">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-xs-12 control-label">Tên đường phố</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="name"  ng-model="data.street.info.name" required placeholder="Tên đường phố">
                                    <span class="text-danger" ng-show="error.name" ng-repeat ="item in error.name">@{{item}}. </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="code" class="col-sm-2 col-xs-12 control-label">Mã đường phố</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" ng-model="data.street.info.code"  required pattern="[\w]+" id="code" placeholder="Mã đường phố">
                                    <span class="text-danger" ng-show="error.code" ng-repeat ="item in error.code">@{{item}}. </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-12 control-label">Phường/Xã</label>
                                <div class="col-sm-4 col-xs-12">
                                    <select class="form-control" ng-model="data.street.info.village_id" required 
                                            ng-options="value.id as value.name for (key, value) in data.village.list">
                                        <option value="">--Chọn Phường/Xã--</option>
                                    </select>
                                    <span class="text-danger" ng-show="error.village_id" ng-repeat ="item in error.village_id">@{{item}}. </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="port" class="col-sm-2 col-xs-12 control-label"></label>
                                <div class="col-sm-4 col-xs-12">
                                    <button type="button" class="btn btn-primary" ng-show="data.street.id <= 0" ng-click="action.insert()"><i class="fa fa-edit"></i> Thêm mới</button>
                                    <button type="button" class="btn btn-primary" ng-show="data.street.id > 0" ng-click="action.update()"><i class="fa fa-edit"></i> Cập nhật</button>
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