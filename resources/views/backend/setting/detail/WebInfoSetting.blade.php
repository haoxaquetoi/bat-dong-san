<angular ng-controller="settingInfoCtrl" ng-cloak="">
    <section class="content  form-magic">
        <form role="form" class="form-horizontal">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin website</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-xs-12 control-label">Tên công ty</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="name" placeholder="Tên công ty" ng-model="name" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-2 col-xs-12 control-label">Số điện thoại</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="phone" placeholder="Số điện thoại" ng-model="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-2 col-xs-12 control-label">Địa chỉ</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="address" placeholder="Địa chỉ" ng-model="address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 col-xs-12 control-label">Email</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="email" placeholder="Email" ng-model="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="slogan" class="col-sm-2 col-xs-12 control-label">slogan</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="slogan" placeholder="Slogan" ng-model="slogan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="port" class="col-sm-2 col-xs-12 control-label"></label>
                                <div class="col-sm-4 col-xs-12">
                                    <button type="button" class="btn btn-primary" ng-click="action.update()">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</angular>