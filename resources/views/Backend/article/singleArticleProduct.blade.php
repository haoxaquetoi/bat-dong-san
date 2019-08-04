@extends('Backend.Layouts.default')
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
                                        <div class="input-group">
                                            <input type="text" class="form-control" ng-model="articleInfo.article_other.facade" />
                                            <span class="input-group-addon">m</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Chiều rộng lối vào</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" ng-model="articleInfo.article_other.entry_width" />
                                            <span class="input-group-addon">m</span>
                                        </div>
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
                                        <div class="input-group">
                                            <input type="text" class="form-control" ng-model="articleInfo.article_other.number_of_storeys" />
                                            <span class="input-group-addon">tầng</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Diện tích nhà</label>
                                        <div class="input-group">
                                            <input type="text"  class="form-control" ng-model="articleInfo.article_other.floor_area" />
                                            <span class="input-group-addon">m<sup>2</sup></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Số phòng ngủ</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" ng-model="articleInfo.article_other.number_of_bedrooms" />
                                            <span class="input-group-addon">phòng</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Số tolet</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" ng-model="articleInfo.article_other.number_of_wc" />
                                            <span class="input-group-addon">phòng</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Mô tả nội thất</label>
                                        <textarea name="txtContentFurniture" id="txtContentFurniture" class="form-control my-ckeditor" ></textarea>
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
                                        <input  type="checkbox"  class="magic-checkbox" ng-checked="articleInfo.is_censored == 1"
                                                ng-click="articleInfo.is_censored = !articleInfo.is_censored" name=chkCensored" id="chkCensored" >
                                        <label for="chkCensored" class="padding-right-20" >
                                            Tin đảm bảo
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-xs-6" style="padding: 0 3px 10px 0">
                                    <div class="form-group">

                                    </div><input  type="checkbox" name="chkSold" id='chkSold' class="magic-checkbox" ng-checked="articleInfo.is_sold == 1" 
                                                  ng-click="articleInfo.is_sold = !articleInfo.is_sold" >
                                    <label for="chkSold" class="padding-right-20" >
                                        Đã bán
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
                                    <a data-input="thumbnail" data-preview="holder" class="btn btn-primary my-lfm-img">
                                        <i class="fa fa-picture-o"></i> Chọn ảnh đại diện
                                    </a>
                                    <input id="thumbnail" class="form-control " type="hidden" value="@{{articleInfo.thumbnail}}" name="filepath" ng-model="articleInfo.thumbnail"  >
                                </div>
                                <img  id="holder" class="img-responsive margin-top-15" src="@{{actions.build_thumnail(articleInfo.thumbnail)}}">
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách ảnh/video slider</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group text-center" id="boxImgSlider">
                                <ul class="clearfix">
                                    <li  ng-repeat=" img in  articleInfo.article_slide.images">
                                        <i ng-show="img.type == 'images'" class="fa fa-remove" title="Xóa" ng-click="actions.removeSlideImg($index)" >&nbsp;</i>
                                        <input  class="form-control txtSliderImg" type="hidden" value="@{{img.path}}"   >
                                        <img  ng-show="img.type == 'images'"  src="@{{img.path}}" class="img-responsive margin-top-15  img-Slider" width="50px" >
                                    </li>

                                    <li  ng-repeat=" img in  articleInfo.article_slide.images" style="display: none">
                                        <input id="chooseImgInput_@{{$index + 1}}" class="form-control txtSliderImg" type="hidden" value="@{{img.path}}"   >
                                        <img  id="chooseImgPreview_@{{$index + 1}}" src="@{{img.path}}" class="img-responsive margin-top-15  img-Slider" width="50px" >
                                    </li>
                                </ul>
                                <div id="boxChooseImgSlider">
                                    <a ng-click="actions.chooseImgSlider('chooseImgInput_' + articleInfo.article_slide.images.length)"  data-input="chooseImgInput_@{{articleInfo.article_slide.images.length}}" data-preview="chooseImgPreview_@{{articleInfo.article_slide.images.length}}" class="btn btn-primary my-lfm-img">
                                        <i class="fa fa-picture-o"></i> Chọn ảnh
                                    </a>
                                </div>


                                <ul class="clearfix">
                                    <li  ng-repeat=" video in  articleInfo.article_slide.video">
                                        <i ng-show="video.type != 'images'" class="fa fa-remove" title="Xóa" ng-click="actions.removeSlideVideo($index)" >&nbsp;</i>
                                        <input  class="form-control txtSliderVideo" type="hidden" value="@{{video.path}}"   >
                                        <video ng-if="video.type == 'video'" width="100" height="100" controls style="float: left;margin: 3px;border: solid 1x">
                                            <source src="@{{video.path}}" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                        <iframe ng-if="video.type == 'youtube'" width="100" height="100" src="@{{video.path| trustAsResourceUrl}}" style="float: left;margin: 3px;"></iframe>
                                    </li>

                                    <li  ng-repeat=" video in  articleInfo.article_slide.video" style="display: none">
                                        <input id="chooseVideoInput_@{{$index + 1}}" class="form-control txtSliderImg" type="hidden" value="@{{video.path}}"   >
                                        <img  id="chooseVideoPreview_@{{$index + 1}}" src="@{{video.path}}" class="img-responsive margin-top-15" width="50px" >
                                    </li>
                                </ul>
                                <div style="margin-top:5px">
                                    <a ng-click="actions.chooseVideoSlider('chooseVideoInput_' + articleInfo.article_slide.video.length)"  data-input="chooseVideoInput_@{{articleInfo.article_slide.video.length}}" data-preview="chooseVideoPreview_@{{articleInfo.article_slide.video.length}}" class="btn btn-primary my-lfm-file">
                                        <i class="fa fa-video-camera"></i> Chọn video
                                    </a>
                                    <a ng-click="actions.chooseVideoYoutubeSlider()"   class="btn btn-primary">
                                        <i class="fa fa-video-camera"></i> Chọn video youtube
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </form>

    </section>
    <!-- /.content -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalChooseYoutube">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Nhập link youtube</h4>
                </div>
                <div class="modal-body form-horizontal clearfix">

                    <div class="row col-xs-9 col-xs-offset-1">
                        <div class="form-group">
                            <label>Nhập link youtube</label>
                            <input id="txtYoutubeID" name="txtYoutubeID" class="form-control" type="text"  value=""  >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" ng-click="actions.saveLinkYoutube()" ><i class="fa fa-save"></i>&nbsp;Xác nhận</button>
                    <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close"  ><i class="fa fa-close"></i>&nbsp;Đóng của sổ</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</angular>





@endsection