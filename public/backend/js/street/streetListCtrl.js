ngApp.controller('streetListCtrl', function ($scope, $apply, $addressService)
{
    $scope.data = {
        street: {
            list: {},
            filter: {
                freeText: '',
                pageSize: 15,
                page: 1
            },
            total: 0
        },
        getList: function () {
            $addressService.action.listStreet($scope.data.street.filter).then(function (resp) {
                $apply(function () {
                    if (resp.status == 200) {
                        $scope.data.street.list = resp.data.data;
                        $scope.data.street.total = resp.data.total;
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
        delete: function (id) {
            $addressService.action.deleteStreet(id).then(function (resp) {
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
            $scope.data.street.filter.page = page;
            $scope.data.getList();
        }
    };
    $scope.data.getList();
});