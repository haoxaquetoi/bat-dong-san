<angular ng-cloak="" >
    <section class="content-header row">
        <div class="col-xs-10">
            <h2>
                Quản lý widget
            </h2>
        </div>
        <div class="col-xs-2 text-right">
            <button class="btn btn-primary margin-top-25">Publish</button>
        </div>
    </section>
    <section class="content  form-magic">
        <form role="form" class="form-horizontal">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Widget hiện có</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6 left-single-widget  padding-bottom-10 " ng-repeat="(code, name) in listWidget">
                                    <div ng-drag="true" ng-drag-data="code" data-allow-transform="true" class="title-single-widget">
                                        @{{name}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <!--column widget-->
                        <div class="col-xs-6"  ng-repeat="(code, item) in listWidgetPosition">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">@{{item.name}}</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body" ng-drop="true" ng-drop-success="actions.insertItem($data,$event,code)">
                                    <div class="row" >
                                        <div class="col-md-12">
                                            <div class="box collapsed-box single-widget" 
                                                 ng-repeat="widgetItem in item.data" ng-drag="true" ng-drag-data="widgetItem" 
                                                  ng-drop="true" ng-drop-success="actions.reOrder($data, widgetItem.order)">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"> @{{listWidget[widgetItem.type]}}</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                        <button type="button" class="btn btn-box-tool" ng-click="actions.deleteWidget(widgetItem.id)">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="box-body" >
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 col-xs-12">Tên công ty</label>
                                                        <div class="col-sm-12 col-xs-12">
                                                            <input type="text" class="form-control" id="name" placeholder="Tên công ty">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone" class="col-sm-12 col-xs-12">Số điện thoại</label>
                                                        <div class="col-sm-12 col-xs-12">
                                                            <input type="text" class="form-control" id="phone" placeholder="Số điện thoại">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xs-12">
                                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end column widget-->
                    </div>
                </div>
            </div>
        </form>
    </section>
</angular>