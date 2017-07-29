ngApp.controller('districtSingleCtrl', function ($scope, $apply, $routeParams, $addressService)
{
    $scope.generalInfoDom;
    $scope.data = {
        district: {
            id: $routeParams.id,
            info: {
                city_id: ''
            }
        },
        city: {
            list: {}
        },
        getInfo: function () {
            $addressService.action.infoDistrict($scope.data.district.id).then(function (resp) {
                $apply(function () {
                    $scope.data.district.info = resp.data;
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
                id: $scope.data.district.id,
                name: $scope.data.district.info.name,
                code: $scope.data.district.info.code,
                city_id: $scope.data.district.info.city_id
            };
            $addressService.action.updateDistrict($scope.data.district.id, dataPost).then(function (resp) {
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
                name: $scope.data.district.info.name,
                code: $scope.data.district.info.code,
                city_id: $scope.data.district.info.city_id
            };
            $addressService.action.insertDistrict(dataPost).then(function (resp) {
                window.location.href = '#!/';
            }, function (errors) {
                console.log(errors);
            });
        }
    };
    $scope.data.getListCity();
    $scope.$watch('data.district.id', function (newVal, oldVal) {
        if (parseInt(newVal) > 0)
        {
            $scope.data.getInfo();
        }
    });
});