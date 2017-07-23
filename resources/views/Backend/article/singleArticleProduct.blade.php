<angular ng-cloak="">
    <section class="content-header">
        <h1>
            Thêm mới tin bất động sản
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/article')}}"><i class="fa fa-dashboard"></i> Quản lý tin bài</a></li>
            <li class="active">Thêm mới tin bất động sản</li>
        </ol>
    </section>
    <section class="content  form-magic">
        <form role="form">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chi tiết tin đăng</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Loại tin</label>
                                <select class="form-control" ng-model="typeArticle" ng-change="actions.changePage()">
                                    <option value="news">Tin đăng</option>
                                    <option value="product">Tin bất động sản</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title-advertising">Tiêu đề <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title-advertising" />
                            </div>
                            <div class="form-group">
                                <label for="url-advertising">Đường dẫn <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="url-advertising" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt</label>
                                <textarea name="txtContent" class="form-control my-ckeditor"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung <span class="text-danger">*</span></label>
                                <textarea name="txtSummary" class="form-control my-ckeditor"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Lịch đăng</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="time-from-advertising">Từ ngày</label>
                                <input type="date" class="form-control" id="time-from-advertising" />
                            </div>
                            <div class="form-group">
                                <label for="time-to-advertising">Đến ngày</label>
                                <input type="date" class="form-control" id="time-to-advertising" />
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control">
                                    <option>Công khai</option>
                                    <option>Viết nháp</option>
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <button type="button" class="btn btn-default">hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chuyên mục</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <select class="form-control">
                                    <option>-- Chọn chuyên mục --</option>
                                    <option>Chuyên mục 1</option>
                                    <option>Chuyên mục 2</option>
                                    <option>Chuyên mục 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tag</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <select class="form-control">
                                    <option>-- Chọn tag --</option>
                                    <option>tag 1</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ảnh minh họa</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group text-center">
                                <div>
                                    <a data-input="thumbnail" data-preview="holder" class="btn btn-primary my-lfm">
                                        <i class="fa fa-picture-o"></i> Chọn ảnh/video
                                    </a>
                                    <input id="thumbnail" class="form-control " type="hidden" name="filepath">
                                </div>
                                <img id="holder" class="img-responsive margin-top-15">
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