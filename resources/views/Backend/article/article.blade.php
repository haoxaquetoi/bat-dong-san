<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách tin đăng 
        <a class="btn btn-primary btn-sm" href="#!/singleNews/0"><i class="fa fa-plus"></i>&nbsp;Thêm mới</a>
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
                                <select class="form-control input-sm">
                                    <option>-- Tất cả chuyên mục --</option>
                                    <option>-- Chuyên mục 1 --</option>
                                    <option>-- Chuyên mục 2 --</option>
                                </select>
                                <input type="date" class="form-control input-sm" id="time_from">
                                <button type="button" class="btn btn-default btn-sm">Lọc</button>
                            </form>
                        </div> 
                        <div class="col-md-5 col-xs-12 padding-bottom-5">
                            <div class="box-tools pull-right">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm">

                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
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
                                            <th class="sorting">Tiêu đề</th>
                                            <th class="sorting">Nổi bật</th>
                                            <th class="sorting">Đảm bảo</th>
                                            <th class="sorting">Phản hồi</th>
                                            <th class="sorting">Ngày đăng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
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
                                            <td class="mailbox-star text-center"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
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
                                        <tr>
                                            <td class="text-center">1</td>
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
                                            <td class="mailbox-star text-center"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
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
                                        <tr>
                                            <td class="text-center">1</td>
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
                                            <td class="mailbox-star text-center"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
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
                                        <tr>
                                            <td class="text-center">1</td>
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
                                            <td class="mailbox-star text-center"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
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
                                        <tr>
                                            <td class="text-center">1</td>
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
                                            <td class="mailbox-star text-center"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
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
                            <div class="col-xs-12">
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

