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
        templateUrl: templateUrl,
        link: link,
    };
});