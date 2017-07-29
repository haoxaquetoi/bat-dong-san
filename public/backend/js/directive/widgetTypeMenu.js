ngApp.directive('widgetTypeMenu', function ($apply, $widgetService, $menuService) {
    var templateUrl = SiteUrl + '/admin/widget/type/menu';
    var restrict = 'C';
    var scope = {widgetData: '='};
    var link = function (scope) {
        scope.formFreeText;
        scope.menuPositionId;
        scope.widgetId;
        scope.listMenuPosition;
        
        scope.data = {
            set: function(data){
                var value = JSON.parse(data.value) || {};
                $apply(function(){
                    scope.menuPositionId = value.menuPositionId || '';
                    scope.widgetId = data.id || '';
                });
            },
            getListMenuPosition: function(){
                $menuService.action.listPosition()
                    .then(function(resp){
                        $apply(function(){
                            scope.listMenuPosition = resp.data;
                            scope.data.setMytitle();
                        });
                    })
                    .catch(function(err){
                        console.log(err);
                    });
            },
            setMytitle: function(){
                $apply(function(){
                    if(parseInt(scope.menuPositionId) > 0)
                    {
                        scope.widgetData.myTitle = scope.listMenuPosition[scope.menuPositionId].name || '';
                    }
                });
            }
        };

        scope.action = {
            update: function(){
                $widgetService.action.updateItem(scope.widgetId, {menuPositionId: scope.menuPositionId})
                    .then(function(resp){
                        $.notify("Cập nhật thành công!", "success");
                        scope.data.setMytitle();
                    })
                    .catch(function(err){
                        console.log(err);
                    });
            }
        };
        
        scope.data.getListMenuPosition();
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