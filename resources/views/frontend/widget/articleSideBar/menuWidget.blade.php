<div class="col-md-12 col-sm-6 col-xs-6" ng-class="class">
    <h4 class="text-uppercase">@{{title}}</h4>
    <ul class="list-unstyled">
        <li ng-repeat="menu in menus" ng-class="{active: data.checkUrl(menu.href)}">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <a href="@{{menu.href}}">
                @{{menu.name}}
            </a>
        </li>
    </ul>
</div>