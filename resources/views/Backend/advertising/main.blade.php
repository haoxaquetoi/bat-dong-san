@extends('backend.layouts.default')
@section('title', 'Quản lý quảng cáoc')
@section('content')
<angular>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách quảng cáo <button class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Thêm quảng cáo</button>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-9 padding-bottom-5">
                <form class="form-inline" role="form">
                    <label class="control-label" for="vi_tri">Vị trí:</label>
                    <input type="email" class="form-control" id="vi_tri" placeholder="Vị trí">
                    <label class="control-label" for="time_from">Thời gian đăng từ</label>
                    <input type="date" class="form-control" id="time_from">
                    <label class="control-label" for="time_to">Đến</label>
                    <input type="date" class="form-control" id="time_to">
                    <button type="button" class="btn btn-default">Lọc</button>
                </form>
            </div>
            <div class="col-xs-3 text-right padding-bottom-5">
                <div class="form-inline">
                    <input type="email" class="form-control" placeholder="Từ khóa">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="dataTables_wrapper form-inline dt-bootstrap">
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
                                                <th>Tiêu đề</th>
                                                <th>Vị trí</th>
                                                <th>Ngày bắt đầu</th>
                                                <th>Ngày kết thúc</th>
                                                <th>Trạng thái</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row">
                                                <td >1</td>
                                                <td class="tbl-actions center">
                                                    <div class="dropdown">
                                                        <a href="javascript:;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="javascript:;">Chi tiết</a></li>
                                                            <li><a href="javascript:;">Xóa</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:;">Quảng cáo mỹ phẩm</a>
                                                </td>
                                                <td><a>Bên phải trang chủ</a>,<a>Bên phải trang chi tiết</a>,<a>Bên phải chuyển mục</a></td>
                                                <td>09/07/2017</td>
                                                <td>09/08/2017</td>
                                                <td><a>Hoạt động</a></td>
                                            </tr>
                                            <tr role="row">
                                                <td >1</td>
                                                <td class="tbl-actions center">
                                                    <div class="dropdown">
                                                        <a href="javascript:;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="javascript:;">Chi tiết</a></li>
                                                            <li><a href="javascript:;">Xóa</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:;">Quảng cáo mỹ phẩm</a>
                                                </td>
                                                <td><a>Bên phải trang chủ</a>,<a>Bên phải trang chi tiết</a>,<a>Bên phải chuyển mục</a></td>
                                                <td>09/07/2017</td>
                                                <td>09/08/2017</td>
                                                <td><a>Hoạt động</a></td>
                                            </tr>
                                            <tr role="row">
                                                <td >1</td>
                                                <td class="tbl-actions center">
                                                    <div class="dropdown">
                                                        <a href="javascript:;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="javascript:;">Chi tiết</a></li>
                                                            <li><a href="javascript:;">Xóa</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:;">Quảng cáo nhà đất</a>
                                                </td>
                                                <td><a>Bên phải trang chủ</a></td>
                                                <td>09/05/2017</td>
                                                <td>09/06/2017</td>
                                                <td><a>Không hoạt động</a></td>
                                            </tr>

                                        </tbody>
                                    </table>
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
    @include('backend.category.modalCategory')
</angular>
@endsection

