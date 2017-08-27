ngApp.controller('villageListCtrl', function ($scope, $apply, $addressService)
{
    $scope.data = {
        village: {
            list: {},
            filter: {
                freeText: '',
                pageSize: 15,
                page: 1
            },
            total: 0
        },
        getList: function () {
            $addressService.action.listVillage($scope.data.village.filter).then(function (resp) {
                $apply(function () {
                    $scope.data.village.list = resp.data.data;
                    $scope.data.village.total = resp.data.total;
                });
            }, function (err) {
                console.log(err);
            });
        }
    };

    $scope.action = {
        delete: function (id) {
            $addressService.action.deleteVillage(id).then(function (resp) {
                if (resp.data && resp.data.status) {
                    $scope.data.getList();
                } else {
                    console.log(resp);
                }

            }, function (err) {
                console.log(err);
            });
        },
        changePage(page) {
            $scope.data.village.filter.page = page;
            $scope.data.getList();
        }
    };
    $scope.data.getList();
});