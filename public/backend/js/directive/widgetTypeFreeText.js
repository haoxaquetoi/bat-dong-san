ngApp.directive('widgetTypeFreeText', function ($apply, $widgetService) {
    var templateUrl = SiteUrl + '/admin/widget/type/freeText';
    var restrict = 'C';
    var scope = {widgetData: '='};
    var link = function (scope) {
        scope.formFreeText;
        scope.freeText;
        scope.widgetId;
        
        scope.data = {
            set: function(data){
                var value = JSON.parse(data.value) || {};
                $apply(function(){
                    scope.freeText = value.freeText || '';
                    scope.widgetId = data.id || '';
                });
            }
        };

        scope.action = {
            update: function(){
                $widgetService.action.updateItem(scope.widgetId, {freeText: scope.freeText})
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