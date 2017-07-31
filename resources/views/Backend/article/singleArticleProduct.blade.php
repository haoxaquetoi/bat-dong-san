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
                        
                            <div class="form-group" ng-class="actions.hasError('content') ? 'has-error' : ''">
                                <label for="txtContent">Nội dung <span class="text-danger">*</span></label>
                                <textarea placeholder="Nội dung"  name="txtContent" id="txtContent" class="form-control my-ckeditor"></textarea>
                                <span class="help-block">@{{actions.showError('content')}}</span>
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
                                <div class="col-xs-6" style="padding: 0 3px 10px 0" ng-class="actions.hasError('begin_date') ? 'has-error' : ''">
                                    <label for="txtbegin_date">Từ ngày</label>
                                    <input type="date" class="form-control" id="txtbegin_date" value="@{{articleInfo.begin_date}}" />
                                    <span class="help-block">@{{actions.showError('begin_date')}}</span>
                                </div>
                                <div class="col-xs-6" style="padding: 0 0 10px 3px" ng-class="actions.hasError('end_date') ? 'has-error' : ''">
                                    <label for="txtend_date">Đến ngày</label>
                                    <input type="date" class="form-control" id="txtend_date" value="@{{articleInfo.end_date}}"  />
                                    <span class="help-block">@{{actions.showError('end_date')}}</span>
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
                                <button type="button" class="btn btn-default" ng-click="actions.cancel()">hủy bỏ</button>
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
                                <button type="button" ng-click="actions.addTags()"  >Lưu</button>
                                <br/>
                                <p>Danh sách thẻ tag đã chọn</p>
                                <div id="newTags">
                                    <a hre="javascript:;" ng-repeat="tag in articleInfo.tags" >
                                        <i class="glyphicon glyphicon-remove-sign" ng-click="actions.removeTags($index)" ></i> @{{tag}}&nbsp;&nbsp;
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Danh sách thẻ tag đã sử dụng</label><br/>
                                <div style="margin: 5px 0 10px;
                                     padding: 8px;
                                     border: 1px solid #ddd;
                                     line-height: 1.8em;
                                     word-spacing: 3px;">
                                    <a hre="javascript:;" ng-repeat="tagOld in allTagsOlds" ng-click="actions.chooseTagsOld(tagOld.code)" ><u>@{{tagOld.code}}</u>&nbsp;</a>
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
                                    <input id="thumbnail" class="form-control " type="hidden" name="filepath" ng-model="articleInfo.thumbnail"  >
                                </div>
                                <img ng-show="actions.build_thumnail(articleInfo.thumbnail)" id="holder" class="img-responsive margin-top-15" src="@{{actions.build_thumnail(articleInfo.thumbnail)}}">
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