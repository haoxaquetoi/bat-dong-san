ngApp.controller('districtListCtrl', function ($scope, $apply, $routeParams, $addressService)
{
    $scope.data = {
        district: {
            list: {},
            filter: {
                freeText: '',
                pageSize: 15,
                page: 1
            },
            total: 0
        },
        getList: function () {
            $addressService.action.listDistrict($scope.data.district.filter).then(function (resp) {
                console.log(resp);
                $apply(function () {
                    if (resp.status == 200) {
                        $scope.data.district.list = resp.data.data;
                        $scope.data.district.total = resp.data.total;
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
            $addressService.action.deleteDistrict(id).then(function (resp) {
                if(resp.data && resp.data.status){
                    $scope.data.getList();
                }else{
                    console.log(resp);
                }
                
            }, function (err) {
                console.log(err);
            });
        },
        changePage(page) {
            $scope.data.district.filter.page = page;
            $scope.data.getList();
        }
    };
    $scope.data.getList();
});