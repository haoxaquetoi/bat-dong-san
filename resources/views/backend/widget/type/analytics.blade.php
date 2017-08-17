<div class="col-xs-12">
    <form ng-dom="formAnalytics">
        <div class="form-group">
            <label for="txtTitle">Title</label>
            <input id="txtTitle" ng-model="title" class="form-control" />
        </div>
        <div class="col-xs-12 text-right">
            <button class="btn btn-primary" ng-click="action.update()">
                <i class="fa fa-save"></i> Cập nhật
            </button>
        </div>
    </form>
</div>