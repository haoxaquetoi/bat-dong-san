<angular ng-cloak="">
    <section class="content-header">
        <h1>
            Cập nhật menu
        </h1>
    </section>
    <section class="content  form-magic">
        <form role="form" class="form-horizontal">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin chung</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-xs-12 control-label">Tên menu <span class="text-danger">*</span></label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="name" placeholder="Tên menu">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="typeMenu" class="col-sm-2 col-xs-12 control-label">Loại menu  <span class="text-danger">*</span></label>
                                <div class="col-sm-4 col-xs-12">
                                    <select class="form-control" name="typeMenu" ng-model="typeMenu">
                                        <option value="link">Liên kết</option>
                                        <option value="category">Chuyên mục</option>
                                        <option value="article">Tin đăng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-xs-12 control-label">Thuộc menu</label>
                                <div class="col-sm-4 col-xs-12">
                                    <select class="form-control" name="">
                                        <option value="">--Thư mục gốc--</option>
                                        <option value="">--Thư mục gốc--</option>
                                        <option value="">--Thư mục gốc--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="url" class="col-sm-2 col-xs-12 control-label">Url hiển thị</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="url" placeholder="url hiển thị">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="url" class="col-sm-2 col-xs-12 control-label"></label>
                                <div class="col-sm-4 col-xs-12">
                                    <button class="btn btn-primary">Cập nhật</button>
                                <button class="btn btn-default">Hủy bỏ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary" ng-show="typeMenu == 'link'">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin menu - Liên kết</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 col-xs-12 control-label">Url  <span class="text-danger">*</span></label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="url">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary" ng-show="typeMenu == 'category'">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin menu - Chuyên mục</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 col-xs-12 control-label">Chuyên mục  <span class="text-danger">*</span></label>
                                <div class="col-sm-4 col-xs-12">
                                    <select class="form-control" name="">
                                        <option value="link">-- Chọn chuyên mục--</option>
                                        <option value="link">-- Chọn chuyên mục--</option>
                                        <option value="link">-- Chọn chuyên mục--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary" ng-show="typeMenu == 'article'">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin menu - Tin đăng</h3>
                            <div class="box-tools pull-right">
                                <a data-toggle="modal" data-target="#modalArticle">Thêm mới</a>/
                                <a>Xóa</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-4 col-xs-12 text-center padding-top-15">
                                    <img src="{{ URL::asset('backend/images/article.png') }}" style="max-width: 1005;" />
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <h4>Bán nhà mặt phố Quang trung - Hà Nội</h4>
                                    <p>
                                        Nhà mới thiết kế xong đẹp lung linh, bố trí 3PN, 2WC, nội thất được trang bị đầy đủ,
                                        phong cách Châu Âu thật đẹp mắt, bao đảm khách hàng nhìn là thích ngay.
                                        Nha đẹp, vị trí đẹp, view công viên hồ bơi và sân chơi trẻ con,
                                        cửa hướng Đông Nam rất thoáng mát.
                                        Là 1 trong những khu cao cấp có đầy đủ tiện ích như: Hồ bơi,
                                        khu tập Gym, khu vui chơi trẻ con, hầm đậu ô tô, công viên đi dạo,
                                        phòng chờ thang máy
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
    @include('backend.menu.modalArticle')
</angular>