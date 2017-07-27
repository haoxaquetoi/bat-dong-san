ngApp.controller('cityListCtrl', function ($scope, $apply, $routeParams, $cityService)
{
    $scope.generalInfoDom;
    $scope.msgErr = '';
    $scope.data = {
        city: {
            id: $routeParams.id,
            list: {},
            filter: {
                freeText: '',
                pageSize: 10,
                page: 1
            },
            total: 0
        },
        getList: function () {
            $cityService.actions.list($scope.data.city.filter).then(function (resp) {
                $apply(function () {
                    console.log(resp);
                    $scope.data.city.list = resp.data;
                });
            }, function (err) {
                console.log(err);
            });
        }
    };

    $scope.action = {
        delete: function () {
        },
        changePage(page) {
            $scope.data.city.filter.page = page;
            $scope.data.getList();
        }
    };
    $scope.data.getList();
});