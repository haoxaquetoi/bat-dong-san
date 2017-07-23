@extends('backend.layouts.default')
@section('title', 'Quản lý người dùng')
@section('content')

@push('scripts')
<script src="{{url('backend')}}/js/crawler/crawlerCtrl.js"></script>
<script src="{{url('backend')}}/js/factory/services/crawlerService.js"></script>
@endpush


<angular ng-controller="crawlerCtrl" ng-cloak="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách nguồn lấy tin <button class="btn btn-primary" ng-click="actions.singleModalCrawler('#modalSingleCrawler')" ><i class="fa fa-plus"></i>&nbsp;Thêm nguồn</button>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row box-filter">
            <div class="col-sm-6 col-sm-offset-6">
                <div  class="dataTables_filter"><label>
                        <input ng-enter="actions.getAllCrawler(data.filter)" type="search" ng-model="data.filter.keywork" class="form-control " placeholder="Nhập từ khóa" ></label>
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
                                                <th>Tên website</th>
                                                <th>Url</th>
                                                <th>Trạng thái</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr role="row" class="odd" ng-repeat="crawlerInfo in data.crawler">
                                                <td >@{{$index + 1}}</td>

                                                <td class="tbl-actions center">
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{URL::asset('/admin/crawler/configCrawler')}}" target="_blank" >Cấu hình chi tiết</a></li>
                                                            <li><a href="javascript:void(0);" ng-click="actions.singleModalCrawler('#modalSingleCrawler', crawlerInfo)">Chi tiết</a></li>
                                                            <li ng-show="!crawlerInfo.deleted"><a href="javascript:void(0);" ng-click="actions.trashWebsite(crawlerInfo.id)">Xóa</a></li>
                                                            <li ng-show="crawlerInfo.deleted"><a href="javascript:void(0);" ng-click="actions.publishWebsite(crawlerInfo)">Khôi phục</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" ng-click="actions.singleModalCrawler('#modalSingleCrawler', crawlerInfo)">&nbsp;@{{crawlerInfo.website_name}}</a>
                                                </td>
                                                <td>
                                                    @{{crawlerInfo.website_url}}
                                                </td>
                                                <td>@{{(crawlerInfo.deleted =='1') ? 'Đã xóa' :'Hoạt động'}}</td>
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
    @include('backend.crawler.modalSingleCrawler')
</angular>
@endsection

