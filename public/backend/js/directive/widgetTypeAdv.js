ngApp.directive('widgetTypeAdv', function ($apply, $userService) {
    var templateUrl = SiteUrl + '/admin/widget/type/adv';
    var restrict = 'C';
    var scope = {widgetData: '='};
    var link = function (scope) {
    };
    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link,
    };
});