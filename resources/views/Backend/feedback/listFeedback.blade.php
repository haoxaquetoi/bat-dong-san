
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
                                    <a ng-class="(data.filter.readed != 0 && data.filter.readed != 1) ? '' : 'text-black'" ng-click="data.filter.readed = -1;actions.getAllPostFd()">Tất cả (@{{count.total}})</a> | <a ng-click="data.filter.readed = 1;actions.getAllPostFd()" ng-class="data.filter.readed == 1 ? '' : 'text-black'"  href="" class="text-black">Đã đọc (@{{count.totalReaded}})</a> | <a ng-class="data.filter.readed == 0 ? '' : 'text-black'" ng-click="data.filter.readed = 0;actions.getAllPostFd()" class="text-black">Chưa đọc (@{{count.totalUnReaded}})</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-9 padding-bottom-5 form-inline">
                                   
                                    <select class="form-control" ng-model="data.filter.fbID">
                                            <option value="">--Chọn loại góp ý--</option>
                                            <option ng-repeat="fbInfo in data.allFeedBack.data"  ng-value="fbInfo.id">@{{fbInfo.name}}</option>
                                        </select>
                                        
                                        <button type="button" class="btn btn-default btn-sm" ng-click="actions.getAllPostFd()">Lọc</button>
                                   
                                </div>
                                <div class="col-md-3 col-xs-12 padding-bottom-5">
                                    <div class="box-tools pull-right">
                                        <div class="input-group input-group-sm" style="width: 250px;">
                                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm tin bài"  ng-model="data.filter.freeText" >
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-default" ng-click="actions.getAllPostFd()" ><i class="fa fa-search"></i></button>
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
                                            <col width='*' />
                                            <col width='30%' />
                                            <col width='17%' />
                                            <col width='17%' />
                                            <col width='15%' />
                                        </colgroup>
                                        <thead>
                                            <tr role="row" >
                                                <th >STT</th>
                                               
                                                <th >Nội dung/Tiêu đề feedback</th>
                                                <th >Tiêu đề tin bài</th>
                                                <th >Ngày gửi</th>
                                                <th >Trạng thái</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" ng-repeat=" singleFbPost in data.allFbPost.data">
                                                <td >@{{$index + 1}}</td>
                                                
                                                <td>
                                                    <a  ng-click="actions.detailPostFb(singleFbPost)"  href="javascript:void(0);" >@{{singleFbPost.value?singleFbPost.value :singleFbPost.feedbackTitle}}</a>
                                                </td>
                                                <td>@{{singleFbPost.postTitle}}</td>
                                                <td>@{{singleFbPost.created_at_dmY}}</td>
                                                <td><a>@{{singleFbPost.readedText}}</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <div paging
                                             page="data.allFbPost.current_page" 
                                             page-size="data.allFbPost.per_page" 
                                             total="data.allFbPost.total"
                                             paging-action="actions.changePage(page)">
                                        </div> 
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
    @include('Backend.feedback.modalFeedback')
</angular>

