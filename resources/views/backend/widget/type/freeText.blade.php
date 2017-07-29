<form ng-dom="formFreeText">
    <div class="form-group">
        <div class="col-xs-12">
            <textarea rows="3" class="form-control" ng-model="freeText"></textarea>
        </div>
    </div>
    <div class="col-xs-12 text-right">
        <button class="btn btn-primary" ng-click="action.update()">
            <i class="fa fa-save"></i> Cập nhật
        </button>
    </div>
</form>