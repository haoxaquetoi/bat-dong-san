<div class="col-md-3 col-sm-6 col-xs-12 statistical" ng-class="class">
    <h4 class="text-uppercase">@{{title}}</h4>
    <div class="row">
        <div class="col-xs-12 text-center padding-bottom-10 statistical-table">
            <button class="btn btn-sm" ng-repeat="item in arrVisitorsTotal track by $index">@{{item}}</button>
        </div>
        <div class="col-xs-12 statistical-today">
            <p class="pull-left"><i class="fa fa-user-circle-o"></i> Hôm nay</p>
            <span class="pull-right">@{{allVisitors.visitorsToday}}</span>
        </div>
        <div class="col-xs-12 statistical-week">
            <p class="pull-left"><i class="fa fa-user-circle-o"></i> Tuần này</p>
            <span class="pull-right">@{{allVisitors.visitorsWeek}}</span>
        </div>
        <div class="col-xs-12 statistical-month">
            <p class="pull-left"><i class="fa fa-user-circle-o"></i> Trong tháng</p>
            <span class="pull-right">@{{allVisitors.visitorsMounth}}</span>
        </div>
        <div class="col-xs-12 statistical-all">
            <p class="pull-left"><i class="fa fa-bar-chart"></i> Tất cả</p>
            <span class="pull-right">@{{allVisitors.visitorsTotal}}</span>
        </div>
    </div>
</div>