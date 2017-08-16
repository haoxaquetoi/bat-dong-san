<div ng-repeat="item in widgetData">
    <div ng-switch="item.type">
        <div ng-switch-when="image" class="image-widget" widget-data="item"></div>
        <div ng-switch-when="freeText" class="free-text-widget-type" widget-data="item"></div>
        <div ng-switch-when="menu" class="menu-widget" widget-data="item"></div>
        <div ng-switch-when="adv" class="adv-widget" widget-data="item"></div>
    </div>
</div>