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
    <section class="content form-magic">
        <form  ng-dom="generalInfoDom">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-8">
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
                                <select class="form-control" ng-model="articleInfo.type" ng-change="actions.changePage()">
                                    <option value="News">Tin đăng</option>
                                    <option value="Product">Tin bất động sản</option>
                                </select>
                            </div>
                            <div class="form-group" ng-class="actions.hasError('title') ? 'has-error' : ''">
                                <label for="txtTitle">Tiêu đề <span class="text-danger">*</span></label>
                                <input placeholder="Tiêu đề" ng-model="articleInfo.title" type="text" class="form-control" id="txtTitle" name="txtTitle" />
                                <span class="help-block">@{{actions.showError('title')}}</span>
                            </div>
                            <div class="form-group" ng-class="actions.hasError('slug') ? 'has-error' : ''">
                                <label for="txtSlug">Đường dẫn <span class="text-danger">*</span></label>
                                <input placeholder="Đường dẫn"  ng-model="articleInfo.slug"  type="text" class="form-control" id="txtSlug"  name="txtSlug" />
                                <span class="help-block">@{{actions.showError('slug')}}</span>
                            </div>
                            <div class="form-group" ng-class="actions.hasError('summary') ? 'has-error' : ''">
                                <label for="txtContent">Tóm tắt</label>
                                <textarea  placeholder="Nội dung tóm tắt" ng-model="articleInfo.summary"  id="txtSummary" name="txtSummary" class="form-control my-ckeditor"></textarea>
                                <span class="help-block">@{{actions.showError('summary')}}</span>
                            </div>
                            <div class="form-group" ng-class="actions.hasError('summary') ? 'has-error' : ''">
                                <label for="txtSummary">Nội dung <span class="text-danger">*</span></label>
                                <textarea placeholder="Nội dung" ng-model="articleInfo.content"  name="txtContent" id="txtContent" class="form-control my-ckeditor"></textarea>
                                <span class="help-block">@{{actions.showError('content')}}</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Lịch đăng</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-xs-6" style="padding: 0 3px 10px 0">
                                    <label for="time-from-advertising">Từ ngày</label>
                                    <input type="date" class="form-control" id="time-from-advertising" />
                                </div>
                                <div class="col-xs-6" style="padding: 0 0 10px 3px">
                                    <label for="time-from-advertising">Đến ngày</label>
                                    <input type="date" class="form-control" id="time-from-advertising" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6" style="padding: 0 3px 10px 0">
                                    <label for="chkSticky">
                                        <input type="checkbox" ng-checked="articleInfo.is_sticky == 1"   name=chkSticky" id="chkSticky" />
                                        Tin nổi bật
                                    </label>
                                </div>
                                <div class="col-xs-6" style="padding: 0 0 10px 3px">
                                    <label for="chkCensored">
                                        <input type="checkbox" ng-checked="articleInfo.is_censored == 1"  name=chkCensored" id="chkCensored" />
                                        Tin đảm bảo
                                    </label>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-xs-6" style="padding: 0 3px 10px 0">
                                    <label>Trạng thái</label>
                                    <select class="form-control" ng-model="articleInfo.status">
                                        <option value="Publish">Công khai</option>
                                        <option value="Trash">Viết nháp</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="button" class="btn btn-primary" ng-click="actions.update()">Lưu</button>
                                <button type="button" class="btn btn-default">hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chuyên mục <span class="text-danger">*</span></h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body" style="max-height: 150px;overflow-y: auto">
                            <div class="form-group">

                                <div ng-repeat="cat in categorys">
                                    <label><input type="checkbox" class="chkCat" name="chkCat[]" value="@{{cat.id}}" >@{{cat.children}}&nbsp;@{{cat.name}}</label>
                                </div>
                                <span style="color: #dd4b39" class="help-block">@{{actions.showError('category')}}</span>
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
                                <input type="text" name="txtTag" id="txtTag" value="" />
                                <button type="button" >Lưu</button>
                                <br/>
                                <p>Danh sách thẻ tag đã chọn</p>
                                <a hre="javascript:;"><i class="glyphicon glyphicon-remove-sign"></i> Thẻ a</a>&nbsp;
                                <a hre="javascript:;"><i class="glyphicon glyphicon-remove-sign"></i> Thẻ a</a>&nbsp;
                                <a hre="javascript:;"><i class="glyphicon glyphicon-remove-sign"></i> Thẻ a</a>&nbsp;
                            </div>
                            <div class="form-group">
                                <label>Danh sách thẻ tag đã sử dụng</label><br/>
                                <div style="margin: 5px 0 10px;
                                     padding: 8px;
                                     border: 1px solid #ddd;
                                     line-height: 1.8em;
                                     word-spacing: 3px;">
                                    <a hre="javascript:;"><u>Thẻ a</u></a>&nbsp;
                                    <a hre="javascript:;"><u>Thẻ a</u></a>&nbsp;
                                    <a hre="javascript:;"><u>Thẻ a</u></a>&nbsp;
                                </div>
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
                                    <input id="thumbnail" class="form-control " type="hidden" name="filepath"  >
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











