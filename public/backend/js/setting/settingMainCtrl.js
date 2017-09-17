ngApp.controller('settingMainCtrl', function ($scope, $settingService, $apply, $rootScope)
{
    $rootScope.active;
    $rootScope.activeData;
    $scope.listSetting;
    $scope.data = {
        list: function(){
            $settingService.action.list().then(function(resp){
                
                $apply(function(){
                    $scope.listSetting = resp.data;
                    var arrCode = Object.keys(resp.data);
                    $scope.data.active(arrCode[0]);
                });
            }).catch(function(err){
                console.log(err);
            });
        },
        urlDetail: function(){
            if($scope.active)
            {
                return SiteUrl + '/admin/setting/detail/' + $scope.active;
            }
        },
        active: function(code){
            $apply(function(){
                $rootScope.activeData = $scope.listSetting[code].value;
                $rootScope.active = code;
            });
        }
    }
    
    $scope.action = {
        active: function(code){
            $scope.data.active(code);
        }
    }
    
    $scope.data.list();
    $rootScope.$watchCollection('activeData', function(newVal, oldVal){
        $scope.data.urlDetail();
    });
});