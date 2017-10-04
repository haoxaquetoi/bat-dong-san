ngApp.controller('footerCtrl', function ($scope,$rootScope, $apply, $widgetService, $analyticsService)
{
    $scope.positionCode = 'footer';
    $scope.widgetData = {};
    
    $scope.data = {
        widget: function(){
            $widgetService.action.widget($scope.positionCode).then(function(resp){
                $apply(function(){
                    $scope.widgetData = resp.data;
                });
            }).catch(function(err){
                console.log(err);
            });
        }
        
    };
    
    $scope.data.widget();
});