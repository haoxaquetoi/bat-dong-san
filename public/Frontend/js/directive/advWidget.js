ngApp.directive('advWidget', function ($apply, $widgetService) {
    var template = '<div ng-include="getView()"></div>';
    var restrict = 'C';
    var scope = {widgetData: '=', widgetPosition: "="};
    var link = function (scope) {
        scope.getView = function(){
            return SiteUrl + '/frontend/widget/type/'+ scope.widgetPosition + '/adv';
        };
        
        scope.action = {
            advLink: function(){
                if(scope.link != ''){
                    window.open(scope.link, '_blank');
                    return true;
                }
                
                return false;
            }
        };
        
        scope.data = {
            load: function () {
                $apply(function () {
                    scope.file_path = (scope.widgetData.cache.adv.file_path)? SiteUrl + scope.widgetData.cache.adv.file_path: '';
                    scope.name = scope.widgetData.cache.adv.name || '';
                    scope.link = scope.widgetData.cache.adv.url || '';
                    scope.class = scope.widgetData.cache.class || '';
                    
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