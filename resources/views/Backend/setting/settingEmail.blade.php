<angular ng-cloak="">
    <section class="content-header">
        <h1>
            Cài đặt thông tin email
        </h1>
    </section>
    <section class="content  form-magic">
        <form role="form" class="form-horizontal">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin email</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="email" class="col-sm-2 col-xs-12 control-label">Địa chỉ hòm thư</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="email" class="form-control" id="email" placeholder="Địa chỉ hòm thư">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="userName" class="col-sm-2 col-xs-12 control-label">Tên đăng nhập</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="userName" placeholder="Tên đăng nhập">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 col-xs-12 control-label">Mật khẩu</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="password" class="form-control" id="password" placeholder="Mật khẩu">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-sm-2 col-xs-12 control-label">SMTPSecure</label>
                                <div class="col-sm-4 col-xs-12 padding-top-7_5">
                                    <input id="status" type="checkbox" name="status" checked="" class="magic-checkbox" />
                                    <label for="status" class="padding-right-20">
                                        Hoạt động
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-2 col-xs-12 control-label">Địa chỉ máy chủ</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="address" placeholder="Địa chỉ máy chủ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="port" class="col-sm-2 col-xs-12 control-label">Cổng</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="port" placeholder="Cổng">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="port" class="col-sm-2 col-xs-12 control-label"></label>
                                <div class="col-sm-4 col-xs-12">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</angular>