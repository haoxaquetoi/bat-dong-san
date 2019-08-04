<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="chossePermitModal" ng-dom="dom">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Phân quyền</h4>
            </div>
            <div class="modal-body">
                <div class="row" style="padding: 10px;">
                    <div class="col-sm-12">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Quyền sử dụng</th>
                            </tr>
                            <tbody ng-repeat="item in list">
                                <tr>
                                    <td colspan="2"><label><i class="text-blue">@{{item.label}}</label></i></td>
                                </tr>
                                <tr ng-repeat="(code, name) in item.permit">
                                    <td><input type="checkbox" id="chk_permit_@{{code}}" ng-model="chklList[code]" /></td>
                                    <td><label for="chk_permit_@{{code}}" class="text-normal">@{{name}}</label></td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" ng-click="action.update()">Cập nhật</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
