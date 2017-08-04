@extends('backend.layouts.default')
@section('title', 'Chi tiết tin đăng')
@section('myJs')
<script>
    ngApp.constant('city',<?php echo json_encode($city) ?>);
    ngApp.constant('district',<?php echo json_encode($district) ?>);
    ngApp.constant('village',<?php echo json_encode($village) ?>);
    ngApp.constant('street',<?php echo json_encode($street) ?>);
    ngApp.constant('tags',<?php echo json_encode($tags) ?>);
    ngApp.constant('category',<?php echo json_encode($category) ?>);
    ngApp.value('articleInfo',<?php echo json_encode($articleInfo) ?>);
    ngApp.value('direction',<?php echo json_encode($direction) ?>);</script>
<script src="{{url('backend')}}/js/factory/services/articleService.js"></script>
<script src="{{ URL::asset('backend/js/article/articleSingleProductCtrl.js') }}"></script>
@endsection
@section('content')

<angular ng-cloak="" ng-controller="articleSingleProductCtrl">
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
                                <div class="col-sm-6 col-xs-12" >
                                    <div class="form-group" ng-class="actions.hasError('article_base.city_id') ? 'has-error' : ''">
                                        <label for="">Tỉnh/Thành phố <span class="text-danger">*</span></label>
                                        <select class="form-control" ng-model="articleInfo.article_base.city_id" ng-change="actions.renderAddress()" >
                                            <option value="" >--Tỉnh/Thành phố--</option>
                                            <option ng-repeat="city in allCity" ng-value="@{{city.id}}"  >@{{city.name}}</option>
                                        </select>
                                        <span class="help-block">@{{actions.showError('article_base.city_id')}}</span>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12" >
                                    <div class="form-group" ng-class="actions.hasError('article_base.district_id') ? 'has-error' : ''">
                                        <label for="">Quận/Huyện <span class="text-danger">*</span></label>
                                        <select class="form-control" ng-model="articleInfo.article_base.district_id" ng-change="actions.renderAddress()">
                                            <option value="">--Quận/Huyện--</option>
                                            <option ng-repeat="district in allDistrict" ng-value="@{{district.id}}" ng-show="district.city_id == articleInfo.article_base.city_id" >@{{district.name}}</option>
                                        </select>
                                        <span class="help-block">@{{actions.showError('article_base.district_id')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group" ng-class="actions.hasError('article_base.village_id') ? 'has-error' : ''">
                                        <label for="">Phường/Xã <span class="text-danger">*</span></label>
                                        <select class="form-control" ng-model="articleInfo.article_base.village_id" ng-change="actions.renderAddress()">
                                            <option value="">--Phường/Xã--</option>
                                            <option ng-repeat="village in allVillage" ng-value="@{{village.id}}"  ng-show="village.district_id == articleInfo.article_base.district_id" >@{{village.name}}</option>
                                        </select>
                                        <span class="help-block">@{{actions.showError('article_base.village_id')}}</span>
                                    </div>

                                </div>
                                <div class="col-sm-6 col-xs-12" >
                                    <div class="form-group" ng-class="actions.hasError('article_base.street_id') ? 'has-error' : ''">
                                        <label for="">Đường/Phố</label>
                                        <select class="form-control" ng-model="articleInfo.article_base.street_id" ng-change="actions.renderAddress()">
                                            <option value="">--Đường/Phố--</option>
                                            <option ng-repeat="street in allStreet" ng-value="@{{street.id}}"  ng-show="street.village_id == articleInfo.article_base.village_id" >@{{street.name}}</option>
                                        </select>
                                        <span class="help-block">@{{actions.showError('article_base.street_id')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group" ng-class="actions.hasError('article_base.address') ? 'has-error' : ''">
                                        <label for="">Địa chỉ <span class="text-danger">*</span></label>

                                        <input type="text" class="form-control" id="txtAddress" value="@{{articleInfo.article_base.address}}"  />
                                        <span class="help-block">@{{actions.showError('article_base.address')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group" ng-class="actions.hasError('article_base.price') ? 'has-error' : ''">
                                        <label for="">Giá</label>
                                        <input type="text" class="form-control" ng-model="articleInfo.article_base.price" />
                                        <span class="help-block">@{{actions.showError('article_base.price')}}</span>
                                    </div>
                                </div>

                            </div>
                            <!--                            <div class="form-group">
                                                            <label for="">Tổng tiền: 1,000,000,000</label>
                                                        </div>-->
                            <div class="form-group">
                                <input id="status" type="checkbox" name="status"  class="magic-checkbox" ng-checked="articleInfo.article_base.myself == 1" ng-click="articleInfo.article_base.myself = !articleInfo.article_base.myself" />
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
                                        <input type="text" class="form-control" ng-model="articleInfo.article_other.facade" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Hướng vào</label>
                                        <input type="text" class="form-control" ng-model="articleInfo.article_other.entry_width" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Hướng nhà</label>
                                        <select class="form-control"  ng-model="articleInfo.article_other.house_direction">
                                            <option value="">--Chọn hướng nhà--</option>
                                            <option ng-repeat="(k, v) in direction" value="@{{k}}" >@{{v}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Hướng ban công</label>
                                        <select class="form-control" ng-model="articleInfo.article_other.balcony_direction">
                                            <option value="">--Chọn hướng ban công--</option>
                                            <option ng-repeat="(k, v) in direction" value="@{{k}}" >@{{v}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Số tầng</label>
                                        <input type="text" class="form-control" ng-model="articleInfo.article_other.number_of_storeys" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="">Số phòng ngủ</label>
                                <input type="text" class="form-control" ng-model="articleInfo.article_other.number_of_bedrooms" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="">Số tolet</label>
                                <input type="text" class="form-control" ng-model="articleInfo.article_other.number_of_wc" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="">Mô tả nội thất</label>
                                <textarea name="txtContentFurniture" class="form-control my-ckeditor" ></textarea>
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
                            <div class="form-group" ng-class="actions.hasError('article_contact.name') ? 'has-error' : ''">
                                <label for="">Tên liên hệ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" ng-model="articleInfo.article_contact.name" />
                                <span class="help-block">@{{actions.showError('article_contact.name')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group" ng-class="actions.hasError('article_contact.address') ? 'has-error' : ''">
                                <label for="">Địa chỉ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" ng-model="articleInfo.article_contact.address" />
                                <span class="help-block">@{{actions.showError('article_contact.address')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group" ng-class="actions.hasError('article_contact.phone') ? 'has-error' : ''">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" ng-model="articleInfo.article_contact.phone" />
                                <span class="help-block">@{{actions.showError('article_contact.phone')}}</span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group" ng-class="actions.hasError('article_contact.mobile') ? 'has-error' : ''">
                                <label for="">Di động <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" ng-model="articleInfo.article_contact.mobile" />
                                <span class="help-block">@{{actions.showError('article_contact.mobile')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group" ng-class="actions.hasError('article_contact.email') ? 'has-error' : ''">
                                <label for="">Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" ng-model="articleInfo.article_contact.email" />
                                <span class="help-block">@{{actions.showError('article_contact.email')}}</span>
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
                            <div class="form-group">
                                <input  type="checkbox"  class="magic-checkbox" ng-checked="articleInfo.is_sticky == 1"  ng-click="articleInfo.is_sticky = !articleInfo.is_sticky"  name=chkSticky" id="chkSticky" />
                                <label for="chkSticky" class="padding-right-20" >
                                    Tin nổi bật
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-6" style="padding: 0 0 10px 3px">
                            <div class="form-group">
                                <input  type="checkbox"  class="magic-checkbox" ng-checked="articleInfo.is_censored == 1" ng-click="articleInfo.is_censored = !articleInfo.is_censored" name=chkCensored" id="chkCensored" >
                                <label for="chkCensored" class="padding-right-20" >
                                    Tin đảm bảo
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-xs-6" style="padding: 0 3px 10px 0">
                            <div class="form-group">
                                <input  type="checkbox" name="chkSold" id='chkSold' class="magic-checkbox" ng-checked="articleInfo.is_sold == 1" ng-click="articleInfo.is_sold = !articleInfo.is_sold"  name=chkSold" id="chkSold" >
                                <label for="chkSold" class="padding-right-20" >
                                    Đã bán
                                </label>
                            </div>
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
                            <label><input type="checkbox" class="chkCat" ng-checked="cat.checked" ng-click="cat.checked = !cat.checked"  value="@{{cat.id}}" >@{{cat.children}}&nbsp;@{{cat.name}}</label>
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
                        <img  id="holder" class="img-responsive margin-top-15" src="@{{actions.build_thumnail(articleInfo.thumbnail)}}">
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

@endsection