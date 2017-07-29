ngApp.controller('districtSingleCtrl', function ($scope, $apply, $routeParams, $addressService)
{
    $scope.generalInfoDom;
    $scope.data = {
        District: {
            id: $routeParams.id,
            info: {}
        },
        getInfo: function () {
            $addressService.action.infoDistrict($scope.data.District.id).then(function (resp) {
                $apply(function () {
                    console.log(resp);
                    $scope.data.District.info = resp.data;
                });
            }, function (err) {
                console.log(err);
            });
        }
    };

    $scope.action = {
        update: function () {
            if (!$($scope.generalInfoDom).parsley().validate())
            {
                return false;
            }
            var dataPost = {
                id: $scope.data.District.id,
                name: $scope.data.District.info.name,
                code: $scope.data.District.info.code
            };
            $addressService.action.updateDistrict($scope.data.District.id, dataPost).then(function (resp) {
                window.location.href = '#!/';
            }, function (errors) {
                console.log(errors);
            });
        },
        insert: function () {
            if (!$($scope.generalInfoDom).parsley().validate())
            {
                return false;
            }
            var dataPost = {
                name: $scope.data.District.info.name,
                code: $scope.data.District.info.code
            };
            $addressService.action.insertDistrict(dataPost).then(function (resp) {
                window.location.href = '#!/';
            }, function (errors) {
                console.log(errors);
            });
        }
    };

    $scope.$watch('data.District.id', function (newVal, oldVal) {
        if (parseInt(newVal) > 0)
        {
            $scope.data.getInfo();
        }
    });
});