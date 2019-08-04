<div class="col-xs-12">
    <form ng-dom="formFreeText">
        <div class="form-group">
            <textarea rows="3" class="form-control" ng-model="freeText"></textarea>
        </div>
        <div class="form-group">
            <label for="txtTitle">Class</label>
            <input id="txtTitle" ng-model="class" class="form-control" />
        </div>
        <div class="col-xs-12 text-right">
            <button class="btn btn-primary" ng-click="action.update()">
                <i class="fa fa-save"></i> Cập nhật
            </button>
        </div>
    </form>
</div>