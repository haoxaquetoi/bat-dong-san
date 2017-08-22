@extends('backend.layouts.default')
@section('title', 'Quản lý người dùng')
@section('content')

@push('scripts')
<script src="{{url('backend')}}/js/crawler/crawlerCtrl.js"></script>
<script src="{{url('backend')}}/js/factory/services/crawlerService.js"></script>
@endpush

<?php
$arrWebsite = app('SettingCrawler')->arrWebsiteGetData;
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách nguồn lấy tin        
    </h1>
</section>
<!-- Main content -->
<section class="content">

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
                                        @for($i = 0; $i < count($arrWebsite); $i++)
                                        <tr role="row" class="odd" >
                                            <td >{{$i + 1}}</td>
                                            <td class="tbl-actions center">
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{URL::asset('/admin/crawler/configCrawler/').$arrWebsite[$i]['code']}}" >Cấu hình chi tiết</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" ng-click="actions.singleModalCrawler('#modalSingleCrawler', crawlerInfo)">&nbsp;{{$arrWebsite[$i]['name']}}</a>
                                            </td>
                                            <td>
                                                {{$arrWebsite[$i]['url']}}
                                            </td>
                                            <td>{{($arrWebsite[$i]['status'] ==true) ? 'Đã xóa' :'Hoạt động'}}</td>
                                        </tr>
                                        @endfor;
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
@endsection

