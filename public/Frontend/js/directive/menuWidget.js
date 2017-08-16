ngApp.directive('menuWidget', function ($apply, $widgetService) {
    var templateUrl = SiteUrl + '/frontend/widget/type/menu';
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