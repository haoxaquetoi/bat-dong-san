@extends('backend.layouts.default')
@section('title', 'Quản lý danh sách tin đăng')
@section('myJs')
categorys
<script>
    ngApp.value('category',<?php echo json_encode($category) ?>);
    ngApp.value('post_date',<?php echo json_encode($post_date) ?>);
    ngApp.value('count',<?php echo json_encode($count) ?>);
    ngApp.value('arrArticle',<?php echo json_encode($arrArticle) ?>);
    ngApp.value('filter',<?php echo json_encode($_REQUEST) ?>);
</script>

<script src="{{url('backend')}}/js/factory/services/articleService.js"></script>
<script src="{{ URL::asset('backend/js/article/articleListCtrl.js') }}"></script>
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách tin đăng 
        <a class="btn btn-primary btn-sm" href="{{ URL::asset('admin/article/singleNews')}}"><i class="fa fa-plus"></i>&nbsp;Thêm mới</a>
    </h1>
</section>
<!-- Main content -->
<section class="content" ng-controller="articleListCtrl" ng-cloak="">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row padding-bottom-10">
                        <div class="col-xs-12">
                            <a ng-class="data.filter.option ? 'text-black' : ''" href="javascript:;" ng-click="data.filter = {};;actions.getAll()" >Tất cả (@{{count.total}})</a> 
                            | <a ng-class="data.filter.option != 'Publish' ? 'text-black' : ''" href="javascript:;" ng-click="data.filter = {};data.filter.option = 'Publish';actions.getAll()" >Công khai (@{{count.total_publish}})</a> 
                            | <a ng-class="data.filter.option != 'Trash' ? 'text-black' : ''" href="javascript:;" ng-click="data.filter = {};data.filter.option = 'Trash';actions.getAll()" >Lưu nháp (@{{count.total_trash}})</a> 
                            | <a ng-class="data.filter.option != 'deleted' ? 'text-black' : ''"  href="javascript:;" ng-click="data.filter = {};data.filter.option = 'deleted';actions.getAll()" >Đã xóa (@{{count.total_deleted}})</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-xs-12 padding-bottom-5">
                            <form class="form-inline" role="form">
                                <select class="form-control input-sm" ng-model="data.filter.category_id" >
                                    <option value="" >-- Tất cả chuyên mục --</option>
                                    <option ng-repeat="cat in data.category" value="@{{cat.id}}" >@{{cat.children}}&nbsp;@{{cat.name}}</option>
                                </select>
                                <select class="form-control input-sm" ng-model="data.filter.post_date" >
                                    <option value="" >-- Tất cả --</option>
                                    <option  ng-repeat="post_date in data.post_date" value="@{{post_date.post_date}}" >Tháng @{{post_date.post_date}}</option>
                                </select>
                                <select class="form-control input-sm" ng-model="data.filter.type" >
                                    <option value="" >-- Tất cả loại tin --</option>
                                    <option value="News" >Tin đăng</option>
                                    <option value="Product" >Tin bất động sản</option>
                                </select>

                                <button ng-click="actions.getAll()" type="button" class="btn btn-default btn-sm">Lọc</button>
                            </form>
                        </div> 
                        <div class="col-md-5 col-xs-12 padding-bottom-5">
                            <div class="box-tools pull-right">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm" ng-model="data.filter.freeText" >
                                    <div class="input-group-btn">
                                        <button ng-click=" actions.getAll()" type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table  class="table table-bordered table-hover dataTable" role="grid" id="example2" >
                                    <colgroup>
                                        <col width='5%' />
                                        <col width='5%' />
                                        <col width='*' />
                                        <col width='20%' />
                                        <col width='17%' />
                                        <col width='17%' />
                                        <col width='15%' />
                                    </colgroup>
                                    <thead>
                                        <tr role="row">
                                            <th>STT</th>
                                            <th>#</th>
                                            <th >Tiêu đề</th>
                                            <th ng-click="actions.sorting('ord_sk')" ng-class="!data.filter.ord_sk ? 'sorting' : data.filter.ord_sk == 'asc' ? 'sorting_asc' : 'sorting_desc'"  >Nổi bật</th>
                                            <th ng-click="actions.sorting('ord_cd')" ng-class="!data.filter.ord_cd ? 'sorting' : data.filter.ord_cd == 'asc' ? 'sorting_asc' : 'sorting_desc'" >Đảm bảo</th>
                                            <th ng-click="actions.sorting('ord_fb')" ng-class="!data.filter.ord_fb ? 'sorting' : data.filter.ord_fb == 'asc' ? 'sorting_asc' : 'sorting_desc'" >Phản hồi</th>
                                            <th ng-click="actions.sorting('ord_crat')" ng-class="!data.filter.ord_crat ? 'sorting' : data.filter.ord_crat == 'asc' ? 'sorting_asc' : 'sorting_desc'">Ngày đăng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="article in data.arrArticle.data">
                                            <td class="text-center">@{{(data.arrArticle.current_page - 1) * data.arrArticle.per_page + $index + 1}}</td>
                                            <td class="tbl-actions text-center">
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{url('admin/article')}}/@{{article.type=='News' ? 'singleNews':'singleProduct'}}/@{{article.id}}">Chi tiết</a></li>
                                                        <li><a  ng-show="!article.deleted" ng-click="actions.delete(article.id)"  href="javascript:void(0);">Xóa</a></li>
                                                        <li><a ng-show="article.deleted"  ng-click="actions.undelete(article.id)"  href="javascript:void(0);">Khôi khục</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <a ng-if="article.deleted == 1"  href="{{url('admin/article')}}/@{{article.type=='News' ? 'singleNews':'singleProduct'}}/@{{article.id}}"  ><strike>@{{article.title}}</strike></a>
                                                <a ng-if="article.deleted != 1" href="{{url('admin/article')}}/@{{article.type=='News' ? 'singleNews':'singleProduct'}}/@{{article.id}}"  >@{{article.title}}</a>
                                            </td>
                                            <td class="mailbox-star text-center">
                                                <a ng-click="actions.updateSticky(article.id)" ng-if="article.is_sticky == 1" href="javascript:;"><i class="fa fa-star text-yellow"></i></a>
                                                <a ng-click="actions.updateSticky(article.id)" ng-if="article.is_sticky == 0" href="javascript:;"href="javascript:;"><i class="fa fa-star-o text-yellow"></i></a>
                                            </td>
                                            <td class="mailbox-star text-center">
                                                <a ng-click="actions.updateCensored(article.id)" ng-show="article.type == 'Product'"  ng-if="article.is_censored == 1" href="javascript:;"><i class="fa fa-star text-yellow"></i></a>
                                                <a ng-click="actions.updateCensored(article.id)" ng-show="article.type == 'Product'" ng-if="article.is_censored == 0" href="javascript:;"href="javascript:;"><i class="fa fa-star-o text-yellow"></i></a>
                                            </td>
                                            <td class="comments column-comments text-center" data-colname="Bình luận">		
                                                <div class="post-com-count-wrapper" ng-click="actions.detailFeedback(article.id)" >
                                                    <a href=""
                                                       class="post-com-count post-com-count-approved">
                                                        <span class="comment-count-approved" aria-hidden="true">1</span>
                                                        <span class="screen-reader-text">1 Bình luận</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>@{{article.begin_date}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    <div paging
                                         page="data.arrArticle.current_page" 
                                         page-size="data.arrArticle.per_page" 
                                         total="data.arrArticle.total"
                                         paging-action="actions.changePage(page)">
                                    </div> 
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.box -->

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalListFeedBack">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalListFeedBack" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Chi tiết thông tin phản hồi</h4>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-primary">Đánh dấu đã đọc</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

</section>


@endsection

