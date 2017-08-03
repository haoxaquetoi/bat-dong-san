<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách tin đăng 
        <a class="btn btn-primary btn-sm" href="{{ URL::asset('admin/article/singleNews')}}"><i class="fa fa-plus"></i>&nbsp;Thêm mới</a>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row padding-bottom-10">
                        <div class="col-xs-12">
                            <a href="">Tất cả (20)</a> | <a href="" class="text-black">Lưu nháp (5)</a> | <a href="" class="text-black">Đã xóa (5)</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-xs-12 padding-bottom-5">
                            <form class="form-inline" role="form">
                                <select class="form-control input-sm" ng-model="data.filter.category_id" >
                                    <option value="" >-- Tất cả chuyên mục --</option>
                                    <option ng-repeat="cat in data.category" value="@{{cat.id}}" >@{{cat.name}}</option>
                                </select>
                                <input type="date" class="form-control input-sm" id="time_from">
                                <button ng-click="actions.getAll()" type="button" class="btn btn-default btn-sm">Lọc</button>
                            </form>
                        </div> 
                        <div class="col-md-5 col-xs-12 padding-bottom-5">
                            <div class="box-tools pull-right">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm" ng-model="data.filter.freeText" >
                                    <div class="input-group-btn">
                                        <button ng-click="actions.getAll()" type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
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
                                            <th class="sorting_asc">STT</th>
                                            <th>#</th>
                                            <th ng-click="actions.sorting()"  class="sorting">Tiêu đề</th>
                                            <th ng-click="actions.sorting('sticky')" class="sorting">Nổi bật</th>
                                            <th ng-click="actions.sorting('censored')" class="sorting">Đảm bảo</th>
                                            <th ng-click="actions.sorting()" class="sorting">Phản hồi</th>
                                            <th ng-click="actions.sorting()" class="sorting">Ngày đăng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="article in data.data.data">
                                            <td class="text-center">@{{(data.data.current_page - 1) * data.data.per_page + $index + 1}}</td>
                                            <td class="tbl-actions text-center">
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{url('admin/article')}}#!/@{{article.type=='News' ? 'singleNews':'singleProduct'}}/@{{article.id}}">Chi tiết</a></li>
                                                        <li><a ng-click="actions.delete(article.id)"  href="javascript:void(0);">Xóa</a></li>
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
                                                <a ng-click="actions.updateCensored(article.id)" ng-if="article.is_censored == 1" href="javascript:;"><i class="fa fa-star text-yellow"></i></a>
                                                <a ng-click="actions.updateCensored(article.id)" ng-if="article.is_censored == 0" href="javascript:;"href="javascript:;"><i class="fa fa-star-o text-yellow"></i></a>
                                            </td>
                                            <td class="comments column-comments text-center" data-colname="Bình luận">		
                                                <div class="post-com-count-wrapper">
                                                    <a href=""
                                                       class="post-com-count post-com-count-approved">
                                                        <span class="comment-count-approved" aria-hidden="true">1</span>
                                                        <span class="screen-reader-text">1 Bình luận</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>@{{article.created_at}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    <div paging
                                         page="data.data.current_page" 
                                         page-size="data.data.per_page" 
                                         total="data.data.total"
                                         paging-action="actions.changePage(page)">
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-danger btn-sm">Xóa</button>
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
</section>

