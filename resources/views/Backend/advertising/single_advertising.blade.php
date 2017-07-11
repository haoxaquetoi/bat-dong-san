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
    <section class="content  form-magic">
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
                                <input id="status" type="checkbox" name="status" checked="" class="magic-checkbox" />
                                <label for="status" class="padding-right-20">
                                    Hoạt động
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <button type="button" class="btn btn-default">hủy bỏ</button>
                            </div>
                        </div>

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
                            <ul class="list-unstyled line-height-32  padding-bottom-15 padding-bottom-15">
                                <li>
                                    <input id="position-1" type="checkbox" name="position" class="magic-checkbox" checked="" />
                                    <label for="position-1" class="padding-right-20">
                                        Bên phải trang chủ
                                    </label>
                                </li>
                                <li>
                                    <input id="position-2" type="checkbox" name="position" class="magic-checkbox" />
                                    <label for="position-2" class="padding-right-20">
                                        Bên phải trang chủ
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <!-- /.box-body -->

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











