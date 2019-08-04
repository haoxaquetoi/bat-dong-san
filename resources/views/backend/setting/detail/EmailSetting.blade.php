<angular ng-controller="settingEmailCtrl" ng-cloak="">
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
                                <label for="userName" class="col-sm-2 col-xs-12 control-label">Tên đăng nhập</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="userName" placeholder="Tên đăng nhập" ng-model="user">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 col-xs-12 control-label">Mật khẩu</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="password" class="form-control" id="password" placeholder="Mật khẩu" ng-model="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-sm-2 col-xs-12 control-label">SMTPSecure</label>
                                <div class="col-sm-4 col-xs-12 padding-top-7_5">
                                    <input id="status" type="checkbox" name="status" checked="" class="magic-checkbox" ng-model="SMTPSecure"/>
                                    <label for="status" class="padding-right-20">
                                        Hoạt động
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-2 col-xs-12 control-label">Địa chỉ máy chủ</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="address" placeholder="Địa chỉ máy chủ" ng-model="serverAddress">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="port" class="col-sm-2 col-xs-12 control-label">Cổng</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="port" placeholder="Cổng" ng-model="port">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="port" class="col-sm-2 col-xs-12 control-label"></label>
                                <div class="col-sm-4 col-xs-12">
                                    <button type="button" class="btn btn-primary" ng-click="action.update()" >Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</angular>