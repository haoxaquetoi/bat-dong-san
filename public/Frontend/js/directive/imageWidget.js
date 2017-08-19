ngApp.directive('imageWidget', function ($apply, $widgetService) {
    var template = '<div ng-include="getView()"></div>';
    var restrict = 'C';
    var scope = {widgetData: '=', widgetPosition: "="};
    var link = function (scope) {
        scope.getView = function () {
            return SiteUrl + '/frontend/widget/type/' + scope.widgetPosition + '/image';
        };
        scope.action = {
            imgLink: function(){
                if(scope.link != ''){
                    window.location.href = scope.link;
                    return true;
                }
                
                return false;
            }
        };
        
        scope.data = {
            load: function () {
                $apply(function () {
                    scope.image = SiteUrl + scope.widgetData.cache.image;
                    scope.title = scope.widgetData.cache.title || '';
                    scope.class = scope.widgetData.cache.class || '';
                    scope.link = scope.widgetData.cache.link || '';
                });
            }
        }
        
        scope.$watchCollection('widgetData', function (newVal, oldVal) {
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