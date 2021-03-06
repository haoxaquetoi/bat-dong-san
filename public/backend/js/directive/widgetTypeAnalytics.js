ngApp.directive('widgetTypeAnalytics', function ($apply, $widgetService) {
    var templateUrl = SiteUrl + '/admin/widget/type/analytics';
    var restrict = 'C';
    var scope = {widgetData: '='};
    var link = function (scope) {
        scope.formAnalytics;
        scope.title;
        scope.class;
        scope.widgetId;
        
        scope.data = {
            set: function(data){
                var value = JSON.parse(data.value) || {};
                $apply(function(){
                    scope.title = value.title || '';
                    scope.class = value.class || '';
                    scope.widgetId = data.id || '';
                });
            }
        };

        scope.action = {
            update: function(){
                $widgetService.action.updateItem(scope.widgetId, {class: scope.class, title: scope.title})
                    .then(function(resp){
                        $.notify("Cập nhật thành công!", "success");
                    })
                    .catch(function(err){
                        console.log(err);
                    });
            }
        };
        
        scope.$watchCollection('widgetData', function(newVal, oldVal){
            scope.data.set(newVal);
        });
        
    };
    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link,
    };
});