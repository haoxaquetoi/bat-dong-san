ngApp.controller('settingInfoCtrl', function ($scope, $apply, $settingService, $rootScope)
{
    $scope.key = $rootScope.active;
    $scope.data = {
        setData: function(data){
            $apply(function(){
                $scope.name = data.name || '';
                $scope.phone = data.phone || '';
                $scope.address = data.address || '';
                $scope.email = data.email || '';
                $scope.slogan = data.slogan || '';
            });
            
        }
    };
    
    $scope.action = {
        update: function(){
            var value = {
                name: $scope.name,
                phone: $scope.phone,
                address: $scope.address,
                email: $scope.email,
                slogan: $scope.slogan
            }
            $settingService.action.update($scope.key, value).then(function(resp){
                $.notify('Cập nhật thành công', 'success');
            }).catch(function(err){
                console.log(err);
            });
        }
    };
    $rootScope.$watchCollection('activeData', function(newVal, oldVal){
        $scope.data.setData(newVal);
    });
});