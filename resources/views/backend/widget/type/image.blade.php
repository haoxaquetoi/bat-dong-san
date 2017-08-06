<div class="col-xs-12">
    <form ng-dom="formImage">
        <div class="form-group text-center">
            <div class="margin-bottom-5">
                <div class="col-xs-12">
                    <a data-input="thumbnail@{{widgetId}}" data-preview="holder@{{widgetId}}" class="btn btn-primary my-lfm-img">
                        <i class="fa fa-picture-o"></i> Chọn ảnh/video
                    </a>
                    <a class="btn btn-danger" ng-click="action.deleteImage()">
                        <i class="fa fa-trash"></i> Xóa
                    </a>
                </div>
                <input id="thumbnail@{{widgetId}}" class="form-control " type="hidden" name="filepath" ng-dom="hdnImage" >
            </div>
            <div class="col-xs-12">
                <img id="holder@{{widgetId}}" class="img-responsive margin-top-15" ng-dom="imagePreview">
            </div>
        </div>
        <div class="form-group">
            <label for="selMenuPosition">Tiêu đề</label>
            <input type="text" id="txtTitle" ng-model="title" class="form-control" />
        </div>
        <div class="form-group">
            <label for="selMenuPosition">Link</label>
            <input type="text" id="txtTitle" ng-model="link" class="form-control" />
        </div>
        <div class="col-xs-12 text-right">
            <button class="btn btn-primary" ng-click="action.update()">
                <i class="fa fa-save"></i> Cập nhật
            </button>
        </div>
    </form>
</div>
