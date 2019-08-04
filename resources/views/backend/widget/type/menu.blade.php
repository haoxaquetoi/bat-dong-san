<div class="col-xs-12">
    <form ng-dom="formMenu">
        <div class="form-group">
            <label for="txtTitle">Title</label>
            <input id="txtTitle" ng-model="title" class="form-control" />
        </div>
        <div class="form-group">
            <label for="selMenuPosition">Danh sách vị trí Menu</label>
            <select id="selMenuPosition" ng-model="menuPositionId" class="form-control" ng-options="item.id as item.name for item in listMenuPosition"></select>
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
