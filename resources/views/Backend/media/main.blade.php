@extends('Backend.Layouts.default')
@section('title', 'Thư viện media')
@section('content')

@push('scripts')
<script src="{{url('backend')}}/js/crawler/crawlerCtrl.js"></script>
<script src="{{url('backend')}}/js/factory/services/crawlerService.js"></script>
@endpush


<angular ng-controller="crawlerCtrl" ng-cloak="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thư viện media
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <h1>
                    <a href="{{URL::asset('/backend/media/media-new')}}" class="btn btn-primary">Thêm mới</a>
                </h1>
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
                                                <th>Tập tin</th>
                                                <th>Ngày đăng</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd" ng-repeat="ou in data.ouChildren">
                                                <td></td>
                                                <td class="tbl-actions center">
                                                    <div class="dropdown">
                                                        <a href="javascript:;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="javascript:;" ng-click="actions.singleOu('#modelSingleOu', ou)">Chi tiết</a></li>
                                                            <li><a href="javascript:;" ng-click="actions.trashUser(ou.id)">Xóa</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td</td>
                                                <td></td>
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
    @include('Backend.crawler.modalSingleCrawler')
</angular>
@endsection

