ngApp.directive('freeTextWidget', function ($apply, $widgetService) {
    var template = '<div ng-include="getView()"></div>';
    var restrict = 'C';
    var scope = {widgetData: '=', widgetPosition: "="};
    var link = function (scope) {
        scope.freeText;
        scope.class;
        
        scope.getView = function(){
            return SiteUrl + '/frontend/widget/type/'+ scope.widgetPosition + '/freeText';
        };
        
        scope.data = {
            load: function(){
                $apply(function(){
                    scope.freeText = scope.widgetData.cache.freeText;
                    scope.class = scope.widgetData.cache.class;
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