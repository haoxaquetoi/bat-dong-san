ngApp.directive('analyticsWidget', function ($apply, $widgetService, $analyticsService) {
    var template = '<div ng-include="getView()"></div>';
    var restrict = 'C';
    var scope = {widgetData: '=', widgetPosition: "="};
    var link = function (scope) {
        scope.info;
        scope.title;
        scope.class;
        scope.arrVisitorsTotal;

        scope.getView = function () {
            return SiteUrl + '/frontend/widget/type/' + scope.widgetPosition + '/analytics';
        };

        scope.data = {
            load: function () {
                $apply(function () {
                    scope.title = scope.widgetData.cache.title;
                    scope.class = scope.widgetData.cache.class;
                });
            }, getTotalVisitors: function () {
                $analyticsService.action.getTotalVisitors().then(function (resp) {
                    $apply(function () {
                        scope.allVisitors = resp.data;
                        var n = scope.allVisitors.visitorsTotal;
                        scope.arrVisitorsTotal = ("" + n).split("");
                    });
                }).catch(function (err) {
                    console.log(err);
                });
            }
        }
        scope.$watchCollection('widgetData', function (newVal, oldVal) {
            scope.data.load();
            scope.data.getTotalVisitors();
        });
    };
    return {
        restrict: restrict,
        scope: scope,
        template: template,
        link: link,
    };
});