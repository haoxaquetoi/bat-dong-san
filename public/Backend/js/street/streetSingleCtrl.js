ngApp.controller('streetSingleCtrl', function ($scope, $apply, $routeParams, $addressService)
{
    $scope.generalInfoDom;
    $scope.data = {
        street: {
            id: $routeParams.id,
            info: {
                village_id: ''
            }
        },
        village: {
            list: {}
        },
        getInfo: function () {
            $addressService.action.infoStreet($scope.data.street.id).then(function (resp) {
                $apply(function () {
                    $scope.data.street.info = resp.data;
                });
            }, function (err) {
                console.log(err);
            });
        },
        getListVillage: function () {
            var dataPost = {
                pageSize: 0
            };
            $addressService.action.listVillage(dataPost).then(function (resp) {
                $apply(function () {
                    if (resp.status == 200) {
                        $scope.data.village.list = resp.data;
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
                id: $scope.data.street.id,
                name: $scope.data.street.info.name,
                code: $scope.data.street.info.code,
                village_id: $scope.data.street.info.village_id
            };
            console.log(dataPost);
            $addressService.action.updateStreet($scope.data.street.id, dataPost).then(function (resp) {
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
                name: $scope.data.street.info.name,
                code: $scope.data.street.info.code,
                village_id: $scope.data.street.info.village_id
            };
            $addressService.action.insertStreet(dataPost).then(function (resp) {
                window.location.href = '#!/';
            }, function (errors) {
                console.log(errors);
            });
        }
    };
    $scope.data.getListVillage();
    $scope.$watch('data.street.id', function (newVal, oldVal) {
        if (parseInt(newVal) > 0)
        {
            $scope.data.getInfo();
        }
    });
});