<div class="modal fade" tabindex="-1" role="dialog" id="modalArticle">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Chọn tin bài</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-7 col-xs-12 padding-bottom-5">
                            <form class="form-inline" role="form">
                                <select class="form-control btn-sm" ng-model="data.article.filter.category_id">
                                    <option value="">-- Chọn chuyên mục--</option>
                                    <option ng-repeat="catInfo in data.category" value="@{{catInfo.id}}" >@{{catInfo.children}}@{{catInfo.name}}</option>
                                </select>
                                <select class="form-control input-sm" ng-model="data.article.filter.post_date" >
                                    <option value="" >-- Tất cả --</option>
                                    <option  ng-repeat="post_date in data.article.post_date" value="@{{post_date.post_date}}" >Tháng @{{post_date.post_date}}</option>
                                </select>
                                <button type="button" class="btn btn-default btn-sm" ng-click="actions.getAllArticle()" >Lọc</button>
                            </form>
                        </div> 
                        <div class="col-md-5 col-xs-12 padding-bottom-5">
                            <div class="box-tools pull-right">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text"  class="form-control pull-right" placeholder="Tìm kiếm" ng-model="data.article.filter.freeText">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default" ng-click="actions.getAllArticle()" ><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table  class="table table-bordered table-hover dataTable" role="grid" id="example2" >
                                    <thead>
                                        <tr role="row">
                                            <th >STT</th>
                                            <th>Tiêu đề</th>
                                            <th >Nổi bật</th>
                                            <th >Đảm bảo</th>
                                            <th >Ngày đăng</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr ng-repeat=" articleInfo in data.article.arrArticle.data" ng-click="actions.chooseArticle(articleInfo);" >
                                            <td class="text-center">@{{(data.article.arrArticle.current_page - 1) * data.article.arrArticle.per_page + $index + 1}}</td>
                                            <td>
                                                <a ng-if="articleInfo.deleted == 1 || articleInfo.expired == 1" ><strike>@{{articleInfo.title}}</strike></a>
                                                <a ng-if="articleInfo.deleted != 1" >@{{articleInfo.title}}</a>
                                            </td>
                                            <td class="mailbox-star text-center">
                                                <a  ng-if="articleInfo.is_sticky == 1" href="javascript:;"><i class="fa fa-star text-yellow"></i></a>
                                                <a  ng-if="articleInfo.is_sticky == 0" href="javascript:;"href="javascript:;"><i class="fa fa-star-o text-yellow"></i></a>
                                            </td>
                                            <td class="mailbox-star text-center">
                                                <a  ng-show="articleInfo.type == 'Product'"  ng-if="articleInfo.is_censored == 1" href="javascript:;"><i class="fa fa-star text-yellow"></i></a>
                                                <a  ng-show="articleInfo.type == 'Product'" ng-if="articleInfo.is_censored == 0" href="javascript:;"href="javascript:;"><i class="fa fa-star-o text-yellow"></i></a>
                                            </td>

                                            <td>@{{article.begin_date}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    <div paging
                                         page="data.article.arrArticle.current_page" 
                                         page-size="data.article.arrArticle.per_page" 
                                         total="data.article.arrArticle.total"
                                         paging-action="actions.changePage(page)">
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close" ><i class="fa fa-close"></i>&nbsp;Đóng của sổ</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
