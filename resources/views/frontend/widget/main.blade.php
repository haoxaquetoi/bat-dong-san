<div ng-repeat="item in widgetData">
    <div ng-switch="item.type">
        <div ng-switch-when="image" class="image-widget" widget-position="positionCode" widget-data="item"></div>
        <div ng-switch-when="freeText" class="free-text-widget" widget-position="positionCode" widget-data="item"></div>
        <div ng-switch-when="menu" class="menu-widget" widget-position="positionCode" widget-data="item"></div>
        <div ng-switch-when="adv" class="adv-widget" widget-position="positionCode" widget-data="item"></div>
        <div ng-switch-when="webInfo" class="web-info-widget" widget-position="positionCode" widget-data="item"></div>
        <div ng-switch-when="analytics" class="analytics-widget" widget-position="positionCode" widget-data="item"></div>
    </div>
</div>