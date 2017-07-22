<angular ng-cloak="">

    <section class="content-header">
        <h1>
            Thêm mới tin đăng
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/advertising')}}"><i class="fa fa-dashboard"></i> Quản lý tin bài</a></li>
            <li class="active">Thêm mới tin đăng</li>
        </ol>
    </section>
    <section class="content  form-magic">
        <form role="form">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Loại tin</label>
                                        <select class="form-control" ng-model="typeArticle" ng-change="actions.changePage()">
                                            <option value="news">Tin đăng</option>
                                            <option value="product">Tin bất động sản</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Tiêu đề <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="url-advertising">Đường dẫn <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="url-advertising" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nội dung mô tả</label>
                                        <textarea name="txtContent" class="form-control my-ckeditor"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin cơ bản</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Tỉnh/Thành phố <span class="text-danger">*</span></label>
                                        <select class="form-control">
                                            <option>--Tỉnh/Thành phố--</option>
                                            <option>Hà Nội</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Quận/Huyện <span class="text-danger">*</span></label>
                                        <select class="form-control">
                                            <option>--Quận/Huyện--</option>
                                            <option>Hà đông</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Phường/Xã <span class="text-danger">*</span></label>
                                        <select class="form-control">
                                            <option>--Phường/Xã--</option>
                                            <option>Hà đông</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Đường/Phố</label>
                                        <select class="form-control">
                                            <option>--Đường/Phố--</option>
                                            <option>Hà đông</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Địa chỉ <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Giá</label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Đơn vị</label>
                                        <select class="form-control">
                                            <option>--Chọn đơn vị giá--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Tổng tiền: 1,000,000,000</label>
                            </div>
                            <div class="form-group">
                                <input id="status" type="checkbox" name="status" checked="" class="magic-checkbox" />
                                <label for="status" class="padding-right-20">
                                    Chính chủ
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin khác</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Mặt tiền</label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Hướng vào</label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Hướng nhà</label>
                                        <select class="form-control">
                                            <option>--Chọn hướng nhà--</option>
                                            <option>đông</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Hướng ban công</label>
                                        <select class="form-control">
                                            <option>--Chọn hướng ban công--</option>
                                            <option>đông</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Số tầng</label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Số phòng ngủ</label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Số tolet</label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Mô tả nội thất</label>
                                        <textarea name="txtContent" class="form-control my-ckeditor"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin liên hệ</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Tên liên hệ</label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Số điện thoại</label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Di động <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Email <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input id="status" type="checkbox" name="status" checked="" class="magic-checkbox" />
                                        <label for="status" class="padding-right-20">
                                            Nhận phản hồi
                                        </label>
                                    </div>
                                </div>
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
                                <ul class="list-unstyled line-height-32">
                                    <li>
                                        <input id="position-1" type="checkbox" name="position" class="magic-checkbox" checked="" />
                                        <label for="position-1" class="padding-right-20">
                                            Tin thường
                                        </label>
                                    </li>
                                    <li>
                                        <input id="position-2" type="checkbox" name="position" class="magic-checkbox" checked=""/>
                                        <label for="position-2" class="padding-right-20">
                                            Tin đảm bảo
                                        </label>
                                    </li>
                                    <li>
                                        <input id="position-3" type="checkbox" name="position" class="magic-checkbox" />
                                        <label for="position-3" class="padding-right-20">
                                            Tin nổi bật
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <button type="button" class="btn btn-default">hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Loại chuyên mục</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <ul class="list-unstyled line-height-32">
                                    <li>
                                        <input id="category-1" type="checkbox" name="category" class="magic-checkbox" checked="" />
                                        <label for="category-1" class="padding-right-20">
                                            Chuyên mục 1
                                        </label>
                                    </li>
                                    <li>
                                        <input id="category-2" type="checkbox" name="category" class="magic-checkbox" checked=""/>
                                        <label for="category-2" class="padding-right-20">
                                            Chuyên mục 2
                                        </label>
                                    </li>
                                    <li>
                                        <input id="category-3" type="checkbox" name="category" class="magic-checkbox" />
                                        <label for="category-3" class="padding-right-20">
                                            Chuyên mục 3
                                        </label>
                                    </li>
                                </ul>
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
                            <h3 class="box-title">Hình ảnh/Video</h3>
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
    @include('backend.crawler.modalSingleCrawler')
</angular>











