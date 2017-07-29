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
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-xs-12 control-label">Mã Phường/Xã</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" ng-model="data.village.info.code" id="name" required pattern="[\w]+" placeholder="Mã Phường/Xã">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-xs-12 control-label">Tỉnh/Thành phố</label>
                                <div class="col-sm-4 col-xs-12">
                                    <select class="form-control" ng-model="data.village.info.district_id" required 
                                            ng-options="value.id as value.name for (key, value) in data.district.list">
                                    </select>
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