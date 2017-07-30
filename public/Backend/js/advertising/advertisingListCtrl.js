ngApp.controller('advertisingListCtrl', function ($scope, $apply, $routeParams, $advService)
{
     $scope.data = {
        adv: {
            list: {},
            filter: {
                freeText: '',
                pageSize: 15,
                page: 1
            },
            total: 0
        },
        getList: function () {
            $advService.action.list($scope.data.adv.filter).then(function (resp) {
                console.log(resp);
                $apply(function () {
                    if (resp.status == 200) {
                        $scope.data.adv.list = resp.data.data;
                        $scope.data.adv.total = resp.data.total;
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
            $advService.action.delete(id).then(function (resp) {
                if(resp.data.status){
                    $scope.data.getList();
                }else{
                    console.log(resp);
                }
                
            }, function (err) {
                console.log(err);
            });
        },
        changePage(page) {
            $scope.data.adv.filter.page = page;
            $scope.data.getList();
        }
    };
    $scope.data.getList();
});