ngApp.directive('menuWidget', function ($apply, $widgetService) {
    var templateUrl = SiteUrl + '/frontend/widget/type/menu';
    var restrict = 'C';
    var scope = {widgetData: '='};
    var link = function (scope) {
        scope.menus;
        scope.data = {
            loadMenu: function(){
                $apply(function(){
                    scope.menus = scope.widgetData.cache;
                });
            }
        }
        scope.$watchCollection('widgetData', function(newVal, oldVal){
            scope.data.loadMenu();
        });
    };
    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link,
    };
});