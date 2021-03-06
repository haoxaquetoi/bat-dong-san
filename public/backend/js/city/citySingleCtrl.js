ngApp.controller('citySingleCtrl', function ($scope, $apply, $routeParams, $addressService)
{
    $scope.generalInfoDom;
    $scope.error = {
        name: '',
        code: ''
    };
    $scope.data = {
        city: {
            id: $routeParams.id,
            info: {}
        },
        getInfo: function () {
            $addressService.action.infoCity($scope.data.city.id).then(function (resp) {
                $apply(function () {
                    $scope.data.city.info = resp.data;
                });
            }, function (err) {
                console.log(err);
            });
        },
        resetError: function () {
            $scope.error = {
                name: '',
                code: ''
            };
        },
        saveAndAddNew: true
    };
    $scope.action = {
        update: function () {
            $scope.data.resetError();
            if (!$($scope.generalInfoDom).parsley().validate())
            {
                return false;
            }
            var dataPost = {
                id: $scope.data.city.id,
                name: $scope.data.city.info.name,
                code: $scope.data.city.info.code
            };
            $addressService.action.updateCity($scope.data.city.id, dataPost).then(function (resp) {
                $.notify('Cập nhật thành công', 'success');
                window.location.href = '#!/';
            }, function (errors) {
                $scope.error = errors.data;
                console.log(errors);
            });
        },
        insert: function () {
            $scope.data.resetError();
            if (!$($scope.generalInfoDom).parsley().validate())
            {
                return false;
            }
            var dataPost = {
                name: $scope.data.city.info.name,
                code: $scope.data.city.info.code
            };
            $addressService.action.insertCity(dataPost).then(function (resp) {
                $.notify('Thêm mới thành công', 'success');
                if ($scope.data.saveAndAddNew) {
                    $scope.data.city.info.name = '';
                    $scope.data.city.info.code = '';
                } else {
                    window.location.href = '#!/';
                }
            }, function (errors) {
                $scope.error = errors.data;
                console.log(errors);
            });
        }
    };

    $scope.$watch('data.city.id', function (newVal, oldVal) {
        if (parseInt(newVal) > 0)
        {
            $scope.data.getInfo();
        }
    });
});