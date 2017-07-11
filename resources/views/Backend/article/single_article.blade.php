@extends('backend.layouts.default')
@section('title', 'Chi tiết quảng cáo')
@section('content')

@push('scripts')
<link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/folder.png')}}">
<script>
    var route_prefix = "{{ url(config('lfm.prefix')) }}";
</script>

<!-- CKEditor init -->
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
<script>
    $('textarea.useCkeditor').ckeditor({
        height: 100,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
</script>
@endpush

<angular ng-cloak="">

    <section class="content-header">
        <h1>
            Thêm mới tin đăng
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/article')}}"><i class="fa fa-dashboard"></i> Quản lý tin bài</a></li>
            <li class="active">Thêm mới tin đăng</li>
        </ol>
    </section>
    <section class="content  form-magic">
        <form role="form">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chi tiết tin đăng</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title-advertising">Loại tin</label>
                                <select class="form-control">
                                    <option>Tin đăng</option>
                                    <option>Tin bất động sản</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title-advertising">Tiêu đề <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title-advertising" />
                            </div>
                            <div class="form-group">
                                <label for="url-advertising">Đường dẫn <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="url-advertising" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt</label>
                                <textarea name="txtContent" class="form-control useCkeditor"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung <span class="text-danger">*</span></label>
                                <textarea name="txtSummary" class="form-control useCkeditor"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Lịch đăng</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="time-from-advertising">Từ ngày</label>
                                <input type="date" class="form-control" id="time-from-advertising" />
                            </div>
                            <div class="form-group">
                                <label for="time-to-advertising">Đến ngày</label>
                                <input type="date" class="form-control" id="time-to-advertising" />
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control">
                                    <option>Công khai</option>
                                    <option>Viết nháp</option>
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <button type="button" class="btn btn-default">hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chuyên mục</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <select class="form-control">
                                    <option>-- Chọn chuyên mục --</option>
                                    <option>Chuyên mục 1</option>
                                    <option>Chuyên mục 2</option>
                                    <option>Chuyên mục 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tag</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <select class="form-control">
                                    <option>-- Chọn tag --</option>
                                    <option>tag 1</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ảnh minh họa</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <input type="file" id="exampleInputFile">
                            </div>
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











