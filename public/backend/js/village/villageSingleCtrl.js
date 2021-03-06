ngApp.controller('villageSingleCtrl', function ($scope, $apply, $routeParams, $addressService)
{
    $scope.generalInfoDom;
    $scope.error = {
        name: '',
        code: '',
        district_id: ''
    };
    $scope.data = {
        village: {
            id: $routeParams.id,
            info: {
                district_id: ''
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
                    $scope.data.district.list = resp.data;

                });
            }, function (err) {
                console.log(err);
            });
        },
        resetError: function () {
            $scope.error = {
                name: '',
                code: '',
                district_id: ''
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
                id: $scope.data.village.id,
                name: $scope.data.village.info.name,
                code: $scope.data.village.info.code,
                district_id: $scope.data.village.info.district_id
            };
            $addressService.action.updateVillage($scope.data.village.id, dataPost).then(function (resp) {
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
                name: $scope.data.village.info.name,
                code: $scope.data.village.info.code,
                district_id: $scope.data.village.info.district_id
            };
            $addressService.action.insertVillage(dataPost).then(function (resp) {
                $.notify('Thêm mới thành công', 'success');
                if ($scope.data.saveAndAddNew) {
                    $scope.data.village.info.name = '';
                    $scope.data.village.info.code = '';
                    $scope.data.village.info.district_id = '';
                } else {
                    window.location.href = '#!/';
                }
            }, function (errors) {
                $scope.error = errors.data;
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