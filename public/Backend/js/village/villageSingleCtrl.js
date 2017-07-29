ngApp.controller('villageSingleCtrl', function ($scope, $apply, $routeParams, $addressService)
{
    $scope.generalInfoDom;
    $scope.data = {
        village: {
            id: $routeParams.id,
            info: {
                city_id: ''
            }
        },
        district: {
            list: {}
        },
        getInfo: function () {
            $addressService.action.infoVillage($scope.data.village.id).then(function (resp) {
                $apply(function () {
                    $scope.data.village.info = resp.data;
                });
            }, function (err) {
                console.log(err);
            });
        },
        getListDistrict: function () {
            var dataPost = {
                pageSize: 0
            };
            $addressService.action.listDistrict(dataPost).then(function (resp) {
                $apply(function () {
                    if (resp.status == 200) {
                        $scope.data.district.list = resp.data;
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
                id: $scope.data.village.id,
                name: $scope.data.village.info.name,
                code: $scope.data.village.info.code,
                district_id : $scope.data.village.info.district_id 
            };
            $addressService.action.updateVillage($scope.data.village.id, dataPost).then(function (resp) {
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
                name: $scope.data.village.info.name,
                code: $scope.data.village.info.code,
                district_id : $scope.data.village.info.district_id 
            };
            $addressService.action.insertVillage(dataPost).then(function (resp) {
                console.log(resp)
                window.location.href = '#!/';
            }, function (errors) {
                console.log(errors);
            });
        }
    };
    $scope.data.getListDistrict();
    $scope.$watch('data.village.id', function (newVal, oldVal) {
        if (parseInt(newVal) > 0)
        {
            $scope.data.getInfo();
        }
    });
});