ngApp.controller('homeSidebarCtrl', function ($scope, $apply, $widgetService)
{
    $scope.positionCode = 'homeSideBar';
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