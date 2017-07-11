@extends('backend.layouts.default')
@section('title', 'Chi tiết quảng cáo')
@section('content')


<angular ng-cloak="">

    <section class="content-header">
        <h1>
            Thêm mới quảng cáo
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/advertising')}}"><i class="fa fa-dashboard"></i> Quản lý quảng cáo</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </section>
    <section class="content">
        <form role="form">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chi tiết Quảng cáo</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title-advertising">Tiêu đề <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title-advertising" />
                            </div>
                            <div class="form-group">
                                <label for="url-advertising">Đường dẫn <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="url-advertising" />
                            </div>
                            <div class="form-group">
                                <label for="time-from-advertising">Thời gian bắt đầu</label>
                                <input type="date" class="form-control" id="time-from-advertising" />
                            </div>
                            <div class="form-group">
                                <label for="time-to-advertising">Thời gian kết thúc</label>
                                <input type="date" class="form-control" id="time-to-advertising" />
                            </div>
                            <div class="form-group">
                                <label for="time-to-advertising">Trạng thái</label>
                                <input type="checkbox" /> <span> Hoạt động</span>

                            </div>


                        </div>
                        <!-- /.box-body -->

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ảnh đại diện</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" id="exampleInputFile">
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Vị trí</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <ul>
                                <li>
                                    <label><input type="checkbox"> Bên phải trang chủ</label>
                                </li>
                                <li>
                                    <label><input type="checkbox"> Bên phải trang chủ</label>
                                </li>
                                <li>
                                    <label><input type="checkbox"> Bên phải trang chủ</label>
                                </li>
                            </ul>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <button type="button" class="btn btn-default">hủy bỏ</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </form>
    </section>
    <!-- /.content -->
    @include('backend.crawler.modalSingleCrawler')
</angular>
@endsection











