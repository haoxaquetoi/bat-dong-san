<angular ng-cloak="">
    <section class="content-header">
        <h1>
            Thêm mới quảng cáo
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/advertising')}}"><i class="fa fa-dashboard"></i> Quản lý quảng cáo</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </section>
    <section class="content  form-magic">
        <form role="form">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chi tiết Quảng cáo</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title-advertising">Tiêu đề <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title-advertising" />
                            </div>
                            <div class="form-group">
                                <label for="url-advertising">Đường dẫn <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="url-advertising" />
                            </div>
                            <div class="form-group">
                                <label for="time-from-advertising">Thời gian bắt đầu</label>
                                <input type="date" class="form-control" id="time-from-advertising" />
                            </div>
                            <div class="form-group">
                                <label for="time-to-advertising">Thời gian kết thúc</label>
                                <input type="date" class="form-control" id="time-to-advertising" />
                            </div>
                            <div class="form-group">
                                <input id="status" type="checkbox" name="status" checked="" class="magic-checkbox" />
                                <label for="status" class="padding-right-20">
                                    Hoạt động
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="time-to-advertising">Ảnh quảng cáo</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <a data-input="thumbnail" data-preview="holder" class="btn btn-primary my-lfm">
                                                <i class="fa fa-picture-o"></i> Chọn ảnh
                                            </a>
                                            <input id="thumbnail" class="form-control" type="hidden" name="filepath">
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:200px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="#!/" class="btn btn-default">hủy bỏ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </form>
    </section>
    <!-- /.content -->
</angular>