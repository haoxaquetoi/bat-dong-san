@extends('backend.layouts.default')
@section('title', 'Quản lý người dùng')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách tin đăng 
        <a class="btn btn-primary btn-sm" href="{{url('admin/article/singleArticle')}}"><i class="fa fa-plus"></i>&nbsp;Thêm mới tin đăng</a>
        <a class="btn btn-primary btn-sm" href="{{url('admin/article/singleArticleBDS')}}"><i class="fa fa-plus"></i>&nbsp;Thêm mới tin BDS</a>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row padding-bottom-10">
                            <div class="col-xs-12">
                                <a href="">Tất cả (20)</a> | <a href="" class="text-black">Lưu nháp (5)</a> | <a href="" class="text-black">Đã xóa (5)</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-9 padding-bottom-5">
                                <form class="form-inline" role="form">
                                    <select class="form-control input-sm">
                                        <option>-- Tất cả chuyên mục --</option>
                                        <option>-- Chuyên mục 1 --</option>
                                        <option>-- Chuyên mục 2 --</option>
                                    </select>
                                    <input type="date" class="form-control input-sm" id="time_from">
                                    <button type="button" class="btn btn-default btn-sm">Lọc</button>
                                </form>
                            </div>
                            <div class="col-xs-3 text-right padding-bottom-5">
                                <div class="form-inline">
                                    <input type="email" class="form-control input-sm" placeholder="nhập từ khóa cần tìm">
                                    <button type="button" class="btn btn-default btn-sm">Tìm</button>
                                </div>
                            </div>
                        </div>
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
                                            <th>Tiêu đề</th>
                                            <th>
                                                Nổi bật
                                            </th>
                                            <th class=" text-center">Đảm bảo</th>
                                            <th class=" text-center">Phản hồi</th>
                                            <th class=" text-center">Ngày đăng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr role="row">
                                            <td >1</td>
                                            <td class="tbl-actions text-center">
                                                <div class="dropdown">
                                                    <a href="javascript:;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{url('admin/advertising/single')}}">Chi tiết</a></li>
                                                        <li><a href="javascript:;">Xóa</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="javascript:;">Nhà đất bán tại việt nam</a>
                                            </td>
                                            <td class="mailbox-star text-center"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                                            <td class=" text-center"><a href="#"><i class="fa fa-cog text-yellow" aria-hidden="true"></i></a></td>
                                            <td class="comments column-comments text-center" data-colname="Bình luận">		
                                                <div class="post-com-count-wrapper">
                                                    <a href=""
                                                       class="post-com-count post-com-count-approved">
                                                        <span class="comment-count-approved" aria-hidden="true">1</span>
                                                        <span class="screen-reader-text">1 Bình luận</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>10:00:00 17/07/2017</td>
                                        <tr role="row">
                                            <td >1</td>
                                            <td class="tbl-actions text-center">
                                                <div class="dropdown">
                                                    <a href="javascript:;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{url('admin/advertising/single')}}">Chi tiết</a></li>
                                                        <li><a href="javascript:;">Xóa</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="javascript:;">Nhà đất bán tại việt nam</a>
                                            </td>
                                            <td class="mailbox-star text-center"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                                            <td class=" text-center"><a href="#"><i class="fa fa-cog text-black" aria-hidden="true"></i></a></td>
                                            <td class="comments column-comments text-center" data-colname="Bình luận">		
                                                <div class="post-com-count-wrapper">
                                                    <a href=""
                                                       class="post-com-count post-com-count-approved">
                                                        <span class="comment-count-approved" aria-hidden="true">1</span>
                                                        <span class="screen-reader-text">1 Bình luận</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>10:00:00 17/07/2017</td>
                                        </tr>
                                        <tr role="row">
                                            <td >1</td>
                                            <td class="tbl-actions text-center">
                                                <div class="dropdown">
                                                    <a href="javascript:;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{url('admin/advertising/single')}}">Chi tiết</a></li>
                                                        <li><a href="javascript:;">Xóa</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="javascript:;">Nhà đất bán tại việt nam</a>
                                            </td>
                                            <td class="mailbox-star text-center"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                                            <td class=" text-center"><a href="#"><i class="fa fa-cog text-black" aria-hidden="true"></i></a></td>
                                            <td class="comments column-comments text-center" data-colname="Bình luận">		
                                                <div class="post-com-count-wrapper">
                                                    <a href=""
                                                       class="post-com-count post-com-count-approved">
                                                        <span class="comment-count-approved" aria-hidden="true">1</span>
                                                        <span class="screen-reader-text">1 Bình luận</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>10:00:00 17/07/2017</td>
                                        </tr>
                                        <tr role="row">
                                            <td >1</td>
                                            <td class="tbl-actions text-center">
                                                <div class="dropdown">
                                                    <a href="javascript:;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{url('admin/advertising/single')}}">Chi tiết</a></li>
                                                        <li><a href="javascript:;">Xóa</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="javascript:;">Nhà đất bán tại việt nam</a>
                                            </td>
                                            <td class="mailbox-star text-center"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                                            <td class=" text-center"><a href="#"><i class="fa fa-cog text-black" aria-hidden="true"></i></a></td>
                                            <td class="comments column-comments text-center" data-colname="Bình luận">		
                                                <div class="post-com-count-wrapper">
                                                    <a href=""
                                                       class="post-com-count post-com-count-approved">
                                                        <span class="comment-count-approved" aria-hidden="true">1</span>
                                                        <span class="screen-reader-text">1 Bình luận</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>10:00:00 17/07/2017</td>
                                        </tr>
                                        <tr role="row">
                                            <td >1</td>
                                            <td class="tbl-actions text-center">
                                                <div class="dropdown">
                                                    <a href="javascript:;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{url('admin/advertising/single')}}">Chi tiết</a></li>
                                                        <li><a href="javascript:;">Xóa</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="javascript:;">Nhà đất bán tại việt nam</a>
                                            </td>
                                            <td class="mailbox-star text-center"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                                            <td class=" text-center"><a href="#"><i class="fa fa-cog text-black" aria-hidden="true"></i></a></td>
                                            <td class="comments column-comments text-center" data-colname="Bình luận">		
                                                <div class="post-com-count-wrapper">
                                                    <a href=""
                                                       class="post-com-count post-com-count-approved">
                                                        <span class="comment-count-approved" aria-hidden="true">1</span>
                                                        <span class="screen-reader-text">1 Bình luận</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>10:00:00 17/07/2017</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Hiển thị 1 -> 10 của 57 bản ghi</div>
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li>
                                        <li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li>
                                        <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li>
                                        <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li>
                                        <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li>
                                        <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li>
                                        <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li>
                                        <li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li>
                                    </ul>
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

@endsection

