ngApp.directive('menuWidget', function ($apply, $widgetService) {
    var template = '<div ng-include="getView()"></div>';
    var restrict = 'C';
    var scope = {widgetData: '=', widgetPosition: "="};
    var link = function (scope) {
        scope.menus;
        scope.title;
        scope.class;
        
        scope.getView = function(){
            return SiteUrl + '/frontend/widget/type/'+ scope.widgetPosition + '/menu';
        };
        
        scope.data = {
            loadMenu: function(){
                $apply(function(){
                    scope.menus = scope.widgetData.cache.menus;
                    scope.title = scope.widgetData.cache.title;
                    scope.class = scope.widgetData.cache.class;
                });
            },
            checkUrl: function(href){
                return (window.location.href == href)? true: false;
            }
        }
        scope.$watchCollection('widgetData', function(newVal, oldVal){
            scope.data.loadMenu();
        });
    };
    return {
        restrict: restrict,
        scope: scope,
        template: template,
        link: link,
    };
});