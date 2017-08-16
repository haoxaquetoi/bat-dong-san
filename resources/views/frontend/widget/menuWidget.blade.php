<ul class="nav navbar-nav navbar-right width-sm-50">
    <li ng-repeat="menu in menus" ng-class="{active: data.checkUrl(menu.href)}"><a href="@{{menu.href}}">@{{menu.name}}</a></li>
</ul>