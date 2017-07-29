<div class="col-xs-12">
    <form ng-dom="formAdv">
        <div class="form-group text-center">
            <div class="margin-bottom-5">
                <div class="col-xs-12">
                    <a class="btn btn-primary" ng-click="action.showModalAdv()">
                        <i class="fa fa-picture-o"></i> Chọn Quảng cáo
                    </a>
                    <a class="btn btn-danger" ng-click="action.deleteAdv()">
                        <i class="fa fa-trash"></i> Xóa
                    </a>
                </div>
            </div>
            <div ng-if="data.checkData()">
                <div class="col-xs-12">
                    <img class="img-responsive margin-top-15" ng-src="@{{data.advImgSrc()}}">
                </div>
                <div class="col-xs-12">
                    <label class="text-center">@{{updateData.name}}</label>
                </div>
            </div>
        </div>
        <div class="col-xs-12 text-right">
            <button class="btn btn-primary" ng-click="action.update()">
                <i class="fa fa-save"></i> Cập nhật
            </button>
        </div>
    </form>
</div>
<chosse-adv-modal dom="advModal" ret-func="action.successChosseAdv(retVal)"></chosse-adv-modal>