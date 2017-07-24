<angular ng-cloak="" >
    <section class="content-header row">
        <div class="col-xs-10">
            <h2>
                Cài đặt thông tin email
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
                                <div class="col-md-6 left-single-widget  padding-bottom-10 " ng-repeat="item in listWidget">
                                    <div ng-drag="true" ng-drag-data="item" data-allow-transform="true" class="title-single-widget">
                                        @{{item.name}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <!--column widget-->
                        <div class="col-xs-6"  ng-repeat="item in listWidgetColumn">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">@{{item.title}}</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body" ng-drop="true" ng-drop-success="actions.drop($data,$event,item)">
                                    <div class="row" >
                                        <div class="col-md-12">
                                            <div class="box collapsed-box single-widget" 
                                                 ng-repeat="(key,values) in item.data  track by $index" ng-drag="true" ng-drag-data="values" 
                                                 ng-drag-success="actions.drag($data,$event,item)" >
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"> @{{values.name}}</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                        <button type="button" class="btn btn-box-tool" ng-click="actions.deleteWidget(item, values)">
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