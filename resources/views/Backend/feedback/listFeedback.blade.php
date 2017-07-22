<angular>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách góp ý
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="dataTables_wrapper dt-bootstrap">
                            <div class="row padding-bottom-10">
                                <div class="col-xs-12">
                                    <a href="">Tất cả (20)</a> | <a href="" class="text-black">Đã đọc (5)</a> | <a href="" class="text-black">Chưa đọc (5)</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-9 padding-bottom-5">
                                    <form class="form-inline" role="form">
                                        <select class="form-control">
                                            <option value="">--Chọn loại bình luận--</option>
                                            <option value="">--feedback1--</option>
                                            <option value="">--feedback2--</option>
                                        </select>
                                        <select class="form-control">
                                            <option value="">--Trạng thái--</option>
                                            <option value="">Đã đọc</option>
                                            <option value="">Chưa đọc</option>
                                        </select>
                                        <button type="button" class="btn btn-default btn-sm">Lọc</button>
                                    </form>
                                </div>
                                <div class="col-md-3 col-xs-12 padding-bottom-5">
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
                            <div class="row">
                                <div class="col-sm-12">
                                    <table  class="table table-bordered table-hover dataTable" role="grid" >
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
                                                <th>Nội dung</th>
                                                <th>Tiêu đề tin bài</th>
                                                <th>Ngày gửi</th>
                                                <th>Trạng thái</th>

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
                                                    <a href="javascript:;" data-toggle="modal" data-target="#modalFeedback">Nội dung 1</a>
                                                </td>
                                                <td>Tin bài 1</td>
                                                <td>09/08/2017</td>
                                                <td><a>Hoạt động</a></td>
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
                                                    <a href="javascript:;" data-toggle="modal" data-target="#modalFeedback">Nội dung 1</a>
                                                </td>
                                                <td>Tin bài 1</td>
                                                <td>09/08/2017</td>
                                                <td><a>Hoạt động</a></td>
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
                                                    <a href="javascript:;" data-toggle="modal" data-target="#modalFeedback">Nội dung 1</a>
                                                </td>
                                                <td>Tin bài 1</td>
                                                <td>09/08/2017</td>
                                                <td><a>Hoạt động</a></td>
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
                                                    <a href="javascript:;" data-toggle="modal" data-target="#modalFeedback">Nội dung 1</a>
                                                </td>
                                                <td>Tin bài 1</td>
                                                <td>09/08/2017</td>
                                                <td><a>Hoạt động</a></td>
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
                        </div>
                    </div>
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    @include('backend.feedback.modalFeedback')
</angular>

