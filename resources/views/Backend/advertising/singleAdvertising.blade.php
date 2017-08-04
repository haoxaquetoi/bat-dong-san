<angular ng-cloak="">
    <section class="content-header">
        <h1>
            Thêm mới quảng cáo
        </h1>
        <ol class="breadcrumb">
            <li><a href="#!/"><i class="fa fa-dashboard"></i> Quản lý quảng cáo</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </section>
    <section class="content  form-magic">
        <form  ng-dom="generalInfoDom">
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
                            <div class="form-group" ng-class="action.hasError('name') ? 'has-error' : ''">
                                <label for="title-advertising">Tiêu đề <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title-advertising" required ng-model="data.adv.info.name"  />
                                <span class="help-block">@{{action.showError('name')}}</span>
                            </div>
                            <div class="form-group" ng-class="action.hasError('url') ? 'has-error' : ''">
                                <label for="url-advertising">Đường dẫn <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="url-advertising"  required ng-model="data.adv.info.url" />
                                <span class="help-block">@{{action.showError('url')}}</span>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-2 col-md-2"  ng-class="action.hasError('begin_date') ? 'has-error' : ''">
                                    <label for="time-from-advertising">Thời gian bắt đầu</label>
                                    <input type="date" class="form-control" id="time-from-advertising" ng-model="data.adv.info.begin_date" />
                                    <span class="help-block">@{{action.showError('begin_date')}}</span>
                                </div>
                                <div class="form-group col-xs-2 col-md-2"  ng-class="action.hasError('end_date') ? 'has-error' : ''">
                                    <label for="time-to-advertising">Thời gian kết thúc</label>
                                    <input type="date" class="form-control" id="time-to-advertising" ng-model="data.adv.info.end_date"  />
                                    <span class="help-block">@{{action.showError('end_date')}}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <input id="status" type="checkbox" name="status" checked="" class="magic-checkbox" ng-model="data.adv.info.status"  />
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
                                            <input id="thumbnail" class="form-control" type="hidden" name="filepath" value="@{{data.adv.info.file_path}}" />
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:200px;" src="@{{action.build_thumnail(data.adv.info.file_path)}}" >
                                        <span class="help-block">@{{action.showError('file_path')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" ng-show="data.adv.id <= 0" ng-click="action.insert()"><i class="fa fa-edit"></i> Thêm mới</button>
                                <button type="button" class="btn btn-primary" ng-show="data.adv.id > 0" ng-click="action.update()"><i class="fa fa-edit"></i> Cập nhật</button>
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