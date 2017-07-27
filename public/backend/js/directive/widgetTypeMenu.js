ngApp.directive('widgetTypeMenu', function ($apply, $userService) {
    var templateUrl = SiteUrl + '/admin/widget/type/menu';
    var restrict = 'C';
    var scope = {dataId: '='};
    var link = function (scope) {
    };
    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link,
    };
});