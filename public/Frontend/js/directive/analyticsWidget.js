ngApp.directive('analyticsWidget', function ($apply, $widgetService) {
    var template = '<div ng-include="getView()"></div>';
    var restrict = 'C';
    var scope = {widgetData: '=', widgetPosition: "="};
    var link = function (scope) {
        scope.info;
        scope.title;
        scope.getView = function(){
            return SiteUrl + '/frontend/widget/type/'+ scope.widgetPosition + '/analytics';
        };
        
        scope.data = {
            load: function(){
                $apply(function(){
                    scope.title = scope.widgetData.cache.title;
                });
            }
        }
        scope.$watchCollection('widgetData', function(newVal, oldVal){
            scope.data.load();
        });
    };
    return {
        restrict: restrict,
        scope: scope,
        template: template,
        link: link,
    };
});