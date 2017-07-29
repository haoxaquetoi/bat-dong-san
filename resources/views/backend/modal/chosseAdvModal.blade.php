<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="chosseUserModal" ng-dom="dom">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Danh sách quảng cáo</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group input-group" >
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search" ng-model="freeText" ng-enter="action.search()">

                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default" ng-click="action.search()"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding: 10px;">
                    <div class="col-sm-12">
                        <table class="table table-hover">
                            <colgroup>
                                <col width="60px" >
                                <col width="*">
                            </colgroup>
                            <tr>
                                <th>#</th>
                                <th>Tiêu đề</th>
                            </tr>
                            <tr ng-repeat="adv in list">
                                <td><img ng-src="@{{data.imgSrc(adv.file_path)}}" width="50px" height="50" ng-click="action.update(adv)"/></td>
                                <td ng-click="action.update(adv)"> @{{adv.name}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-12 text-right" >
                        <paging
                            page="page" 
                            page-size="perPage" 
                            total="total"
                            show-prev-next="true"
                            show-first-last="true">
                        </paging>  
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
