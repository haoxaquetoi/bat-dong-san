@extends('backend.layouts.default')
@section('title', 'Quản lý người dùng')
@section('content')
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
                                            <th>Tên website</th>
                                            <th>Url</th>
                                            <th>Trạng thái</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i =1;
                                        ?>
                                        @foreach ($arrWebsite as $key=>$val)
                                        <tr role="row" class="odd" >
                                            <td >{{$i + 1}}</td>
                                            <td>
                                                <a href="{{URL::asset('/admin/crawler/configCrawler').'/'.$key.'/0'}}" >&nbsp;{{$val['name']}}</a>
                                            </td>
                                            <td>
                                                {{$val['url']}}
                                            </td>
                                            <td>{{($val['status'] ==true) ? 'Hoạt động' :'Không hoạt động'}}</td>
                                        </tr>
                                        @endforeach
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
@endsection

