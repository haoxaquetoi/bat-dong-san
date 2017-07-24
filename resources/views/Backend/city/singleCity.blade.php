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
        <form role="form" class="form-horizontal">
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
                                    <input type="text" class="form-control" id="name" placeholder="Tên Tỉnh/Thành phố">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-xs-12 control-label">Mã Tỉnh/Thành phố</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="name" placeholder="Mã Tỉnh/Thành phố">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-2 col-xs-12 control-label">Thứ tự hiển thị</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="phone" placeholder="Thứ tự hiển thị">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-sm-2 col-xs-12 control-label"></label>
                                <div class="col-sm-4 col-xs-12 padding-top-7_5">
                                    <input id="status" type="checkbox" name="status" checked="" class="magic-checkbox" />
                                    <label for="status" class="padding-right-20">
                                        Hoạt động
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="port" class="col-sm-2 col-xs-12 control-label"></label>
                                <div class="col-sm-4 col-xs-12">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Cập nhật</button>
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