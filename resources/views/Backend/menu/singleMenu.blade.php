<angular ng-cloak="">
    <section class="content-header">
        <h1>
            Cập nhật menu
        </h1>
    </section>
    <section class="content  form-magic">
        <form role="form" class="form-horizontal">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin chung</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group" ng-class="actions.hasError('name') ? 'has-error' : ''">
                                <label for="name" class="col-sm-2 col-xs-12 control-label">Tên menu <span class="text-danger">*</span></label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="txtMenuName" placeholder="Tên menu" ng-model="data.menuInfo.name" >
                                    <span class="help-block">@{{actions.showError('name')}}</span>
                                </div>
                            </div>
                            <div class="form-group" ng-class="actions.hasError('type') ? 'has-error' : ''">
                                <label for="typeMenu" class="col-sm-2 col-xs-12 control-label">Loại menu  <span class="text-danger">*</span></label>
                                <div class="col-sm-4 col-xs-12">
                                    <select class="form-control" name="typeMenu" ng-model="data.menuInfo.type">
                                        <option value="link">Liên kết</option>
                                        <option value="category">Chuyên mục</option>
                                        <option value="article">Tin đăng</option>
                                    </select>
                                    <span class="help-block">@{{actions.showError('type')}}</span>
                                </div>
                            </div>
                            <div class="form-group" ng-class="actions.hasError('parent') ? 'has-error' : ''">
                                <label class="col-sm-2 col-xs-12 control-label">Thuộc menu</label>
                                <div class="col-sm-4 col-xs-12">
                                    <select class="form-control" ng-model="data.menuInfo.parent">
                                        <option value="0">--Thư mục gốc--</option>
                                        <option ng-repeat=" menu in data.listMenu" ng-value="@{{menu.id}}">@{{menu.split_child}} @{{menu.name}}</option>
                                    </select>
                                    <span class="help-block">@{{actions.showError('parent')}}</span>
                                </div>
                            </div>
                            <div class="form-group" ng-class="actions.hasError('order') ? 'has-error' : ''">
                                <label for="url" class="col-sm-2 col-xs-12 control-label">Thứ tự hiển thị</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="number" min="1" class="form-control"placeholder="Thứ tự hiển thị" ng-model="data.menuInfo.order" >
                                    <span class="help-block">@{{actions.showError('order')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="url" class="col-sm-2 col-xs-12 control-label"></label>
                                <div class="col-sm-4 col-xs-12">
                                    <button ng-show="!data.menuInfo.id" class="btn btn-primary" ng-click="actions.addNewMenu()">Thêm mới</button>
                                    <button ng-show="data.menuInfo.id" class="btn btn-primary" ng-click="actions.updateMenu()" >Cập nhật</button>
                                    <button class="btn btn-default" ng-click="actions.goback()">Hủy bỏ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary" ng-show="data.menuInfo.type == 'link'">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin menu - Liên kết</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group" ng-class="actions.hasError('value.url') ? 'has-error' : ''">
                                <label for="" class="col-sm-2 col-xs-12 control-label">Url  <span class="text-danger">*</span></label>
                                <div class="col-sm-4 col-xs-12">
                                    <input type="text" class="form-control"  ng-model="data.menuInfo.value.url">
                                    <span class="help-block">@{{actions.showError('value.url')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary" ng-show="data.menuInfo.type == 'category'">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin menu - Chuyên mục</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group" ng-class="actions.hasError('value.categoryID') ? 'has-error' : ''">
                                <label for="" class="col-sm-2 col-xs-12 control-label">Chuyên mục  <span class="text-danger">*</span></label>
                                <div class="col-sm-4 col-xs-12">
                                    <select class="form-control" ng-model="data.menuInfo.value.categoryID">
                                        <option value="">-- Chọn chuyên mục--</option>
                                        <option ng-repeat="catInfo in data.category" value="@{{catInfo.id}}" >@{{catInfo.children}}@{{catInfo.name}}</option>
                                    </select>
                                    <span class="help-block">@{{actions.showError('value.categoryID')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary" ng-show="data.menuInfo.type == 'article'">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin menu - Tin đăng</h3>
                            <div class="box-tools pull-right">
                                <a data-toggle="modal" data-target="#modalArticle">Chọn tin bài</a>
                                <a ng-show="data.article.articleSelected.id"  href="javascript:void(0);" ng-click="actions.removeSelectedArticle()" >/ Xóa</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group" ng-class="actions.hasError('value.articleID') ? 'has-error' : ''">
                                <div class="col-sm-4 col-xs-12 text-center padding-top-15">
                                    <img src="{{ URL::asset('') }}@{{data.article.articleSelected.thumbnail}}" width="200" />
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <h4>@{{data.article.articleSelected.title}}</h4>
                                    <p ng-if="data.article.articleSelected.type == 'News'" ng-bind-html="data.article.articleSelected.summary" ></p>
                                    <p ng-if="data.article.articleSelected.type == 'Product'" ng-bind-html="data.article.articleSelected.content" ></p>
                                </div>
                                <span class="help-block">@{{actions.showError('value.articleID')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
    @include('backend.menu.modalArticle')
</angular>