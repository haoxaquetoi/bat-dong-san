<div class="col-xs-12">
    <form ng-dom="formFreeText">
        <div class="form-group">
            <label for="selMenuPosition">Danh sách vị trí Menu</label>
            <select id="selMenuPosition" ng-model="menuPositionId" class="form-control" ng-options="item.id as item.name for item in listMenuPosition"></select>
        </div>
        <div class="col-xs-12 text-right">
            <button class="btn btn-primary" ng-click="action.update()">
                <i class="fa fa-save"></i> Cập nhật
            </button>
        </div>
    </form>
</div>
