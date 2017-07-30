<angular ng-cloak="">
    <section class="content-header">
        <h1>
            Cập nhật Quận/Huyện
        </h1>
        <ol class="breadcrumb">
            <li><a href="#!/"><i class="fa fa-dashboard"></i> Quản lý Quận/Huyện</a></li>
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
                                <label for="name" class="col-sm-2 col-xs-12 control-label">Tên Quận/huyện</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" ng-model="data.district.info.name" id="name" required placeholder="Tên Quận/Huyện">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="code" class="col-sm-2 col-xs-12 control-label">Mã Quận/Huyện</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" ng-model="data.district.info.code" id="code" required pattern="[\w]+" placeholder="Mã Quận/Huyện">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-12 control-label">Tỉnh/Thành phố</label>
                                <div class="col-sm-4 col-xs-12">
                                    <select class="form-control" ng-model="data.district.info.city_id" required 
                                            ng-options="value.id as value.name for (key, value) in data.city.list">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="port" class="col-sm-2 col-xs-12 control-label"></label>
                                <div class="col-sm-4 col-xs-12">
                                    <button type="button" class="btn btn-primary" ng-show="data.district.id <= 0" ng-click="action.insert()"><i class="fa fa-edit"></i> Thêm mới</button>
                                    <button type="button" class="btn btn-primary" ng-show="data.district.id > 0" ng-click="action.update()"><i class="fa fa-edit"></i> Cập nhật</button>
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