ngApp.directive('widget', function ($apply, $widgetService) {
    var templateUrl = SiteUrl + '/frontend/widget';
    var restrict = 'E';
    var scope = {positionCode: '=', widgetData: '='};
    var link = function (scope) {
    };
    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link,
    };
});