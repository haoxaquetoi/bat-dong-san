ngApp.controller('districtSingleCtrl', function ($scope, $apply, $routeParams, $addressService)
{
    $scope.generalInfoDom;
    $scope.data = {
        District: {
            id: $routeParams.id,
            info: {
                city_id: ''
            }
        },
        city: {
            list: {}
        },
        getInfo: function () {
            $addressService.action.infoDistrict($scope.data.District.id).then(function (resp) {
                $apply(function () {
                    $scope.data.District.info = resp.data;
                    $scope.data.District.info.city_id = resp.data.city_id;
                });
            }, function (err) {
                console.log(err);
            });
        },
        getListCity: function () {
            var dataPost = {
                pageSize: 0
            };
            $addressService.action.listCity(dataPost).then(function (resp) {
                $apply(function () {
                    if (resp.status == 200) {
                        $scope.data.city.list = resp.data;
                    } else {
                        console.log(resp);
                    }

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
                code: $scope.data.District.info.code,
                city_id: $scope.data.District.info.city_id
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
                code: $scope.data.District.info.code,
                city_id: $scope.data.District.info.city_id
            };
            $addressService.action.insertDistrict(dataPost).then(function (resp) {
                window.location.href = '#!/';
            }, function (errors) {
                console.log(errors);
            });
        }
    };

    $scope.$watch('data.District.id', function (newVal, oldVal) {
        $scope.data.getListCity();
        if (parseInt(newVal) > 0)
        {
            $scope.data.getInfo();
        }
    });
});