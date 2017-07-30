ngApp.controller('settingEmailCtrl', function ($scope, $apply, $settingService, $rootScope)
{
    $scope.key = $rootScope.active;
    $scope.data = {
        setData: function(data){
            $apply(function(){
                $scope.user = data.user || '';
                $scope.password = data.password || '';
                $scope.SMTPSecure = data.SMTPSecure || false;
                $scope.serverAddress = data.serverAddress || '';
                $scope.port = data.port || '';
            });
            
        }
    };
    
    $scope.action = {
        update: function(){
            var value = {
                user: $scope.user,
                password: $scope.password,
                SMTPSecure: $scope.SMTPSecure,
                serverAddress: $scope.port,
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