ngApp.directive('imageWidget', function ($apply, $widgetService) {
    var template = '<div ng-include="getView()"></div>';
    var restrict = 'C';
    var scope = {widgetData: '=', widgetPosition: "="};
    var link = function (scope) {
        scope.getView = function(){
            return SiteUrl + '/frontend/widget/type/'+ scope.widgetPosition + '/image';
        };
    };
    return {
        restrict: restrict,
        scope: scope,
        template: template,
        link: link,
    };
});