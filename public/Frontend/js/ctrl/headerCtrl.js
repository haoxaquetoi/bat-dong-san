ngApp.controller('headerCtrl', function ($scope, $apply, $widgetService)
{
    $scope.positionCode = 'header';
    $scope.widgetData = {};
    
    $scope.data = {
        widget: function(){
            $widgetService.action.widget($scope.positionCode).then(function(resp){
                $apply(function(){
                    $scope.widgetData = resp.data;
                    console.log(resp.data);
                });
            }).catch(function(err){
                console.log(err);
            });
        }
    };
    
    $scope.data.widget();
});