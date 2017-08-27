ngApp.controller('streetSingleCtrl', function ($scope, $apply, $routeParams, $addressService)
{
    $scope.generalInfoDom;
    $scope.error = {
        name: '',
        code: '',
        village_id: ''
    };
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
                    $scope.data.village.list = resp.data;

                });
            }, function (err) {
                console.log(err);
            });
        },
        resetError: function () {
            $scope.error = {
                name: '',
                code: '',
                village_id: ''
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
                id: $scope.data.street.id,
                name: $scope.data.street.info.name,
                code: $scope.data.street.info.code,
                village_id: $scope.data.street.info.village_id
            };
            $addressService.action.updateStreet($scope.data.street.id, dataPost).then(function (resp) {
                $.notify('Cập nhật thành công', 'success');
                window.location.href = '#!/';
            }, function (errors) {
                $scope.error = errors.data;
            });
        },
        insert: function () {
            $scope.data.resetError();
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
                $.notify('Thêm mới thành công', 'success');
                if ($scope.data.saveAndAddNew) {
                    $scope.data.street.info.name = '';
                    $scope.data.street.info.code = '';
                    $scope.data.street.info.village_id = '';
                } else {
                    window.location.href = '#!/';
                }
            }, function (errors) {
                $scope.error = errors.data;
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