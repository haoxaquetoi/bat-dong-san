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
                pageSize: 15,
                page: 1
            },
            total: 0
        },
        getList: function () {
            $cityService.actions.list($scope.data.city.filter).then(function (resp) {
                console.log(resp);
                $apply(function () {
                    if(resp.status == 200){
                        $scope.data.city.list = resp.data.data;
                        $scope.data.city.total = resp.data.total;
                    }else{
                        console.log(resp);
                    }
                    
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