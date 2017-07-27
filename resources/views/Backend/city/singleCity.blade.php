<angular ng-cloak="">
    <section class="content-header">
        <h1>
            Cập nhật Tỉnh/Thành phố
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/city')}}"><i class="fa fa-dashboard"></i> Quản lý Tỉnh/Thành phố</a></li>
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
                                <label for="name" class="col-sm-2 col-xs-12 control-label">Tên Tỉnh/Thành phố</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="name" required ng-model="data.city.info.name" placeholder="Tên Tỉnh/Thành phố">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="code" class="col-sm-2 col-xs-12 control-label">Mã Tỉnh/Thành phố</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="code" required  pattern="[\w]+" ng-model="data.city.info.code" placeholder="Mã Tỉnh/Thành phố">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="port" class="col-sm-2 col-xs-12 control-label"></label>
                                <div class="col-sm-4 col-xs-12">
                                    <button type="submit" class="btn btn-primary" ng-show="data.city.id <= 0" ng-click="action.insert()"><i class="fa fa-edit"></i> Thêm mới</button>
                                    <button type="submit" class="btn btn-primary" ng-show="data.city.id > 0" ng-click="action.update()"><i class="fa fa-edit"></i> Cập nhật</button>
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