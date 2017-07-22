<angular>
    <section class="content-header">
        <h1>
            Quản lý menu
        </h1>
    </section>
    <section class="content form-magic">
        <form role="form">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Vị trí menu</h3>
                            <div class="box-tools pull-right">
                                <a class="btn padding-right-0" data-toggle="modal" data-target="#modalPositionMenu"><i class="fa fa-plus"></i> Thêm mới</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row padding-top-15">
                                <div class="col-xs-12">
                                    <label class="pull-left">
                                        <a data-toggle="modal" data-target="#modalPositionMenu">Menu top</a>
                                    </label>
                                    <label class="pull-right">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#modalPositionMenu" class="padding-5"><i class="fa fa-edit text-primary"></i></a>
                                        <a href="javascript:void(0)" class="padding-5"><i class="fa fa-trash text-danger"></i></a>
                                    </label>
                                </div>
                            </div>
                            <div class="row padding-top-15">
                                <div class="col-xs-12">
                                    <label class="pull-left">
                                        <a data-toggle="modal" data-target="#modalPositionMenu">Menu footer</a>
                                    </label>
                                    <label class="pull-right">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#modalPositionMenu" class="padding-5"><i class="fa fa-edit text-primary"></i></a>
                                        <a href="javascript:void(0)" class="padding-5"><i class="fa fa-trash text-danger"></i></a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </h3>
                            <div class="box-tools pull-right">
                                <a href="#!/single/0" class="btn padding-right-0"><i class="fa fa-plus"></i> Thêm mới</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
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
                                        <th class="sorting">STT</th>
                                        <th>#</th>
                                        <th class="sorting_asc">Tên menu</th>
                                        <th class="sorting">Loại menu</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row">
                                        <td class="text-center">1</td>
                                        <td class="tbl-actions text-center">
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="">Chi tiết</a></li>
                                                    <li><a href="javascript:void(0);">Xóa</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#!/single/0" data-toggle="modal" data-target="#modalSettingFeedback">Trang chủ</a>
                                        </td>
                                        <td>Link</td>
                                    </tr>
                                    <tr role="row">
                                        <td class="text-center">2</td>
                                        <td class="tbl-actions text-center">
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="">Chi tiết</a></li>
                                                    <li><a href="javascript:void(0);">Xóa</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#!/single/0" data-toggle="modal" data-target="#modalSettingFeedback">Giới thiệu</a>
                                        </td>
                                        <td>Chuyên mục</td>
                                    </tr>
                                    <tr role="row">
                                        <td class="text-center">3</td>
                                        <td class="tbl-actions text-center">
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="">Chi tiết</a></li>
                                                    <li><a href="javascript:void(0);">Xóa</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#!/single/0" data-toggle="modal" data-target="#modalSettingFeedback">-- Dịch vụ</a>
                                        </td>
                                        <td>Tin bài</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </form>
    </section>
    @include('backend.menu.modalPositionsMenu')
</angular>

