ngApp.controller('groupListCtrl', function ($scope, $apply, $location, $groupService)
{
    $scope.list = [];
    $scope.page = 1;
    $scope.pageSize = 15;
    $scope.total;

    $scope.freeText;
    $scope.data = {
        list: function () {
            $groupService.actions.list($scope.page, $scope.freeText).then(function (resp) {
                $apply(function () {
                    $scope.list = resp.data.data;
                    $scope.total = resp.data.total;
                });
            }, function (errors) {
                console.log(errors);
            });
        }
    };

    $scope.actions = {
        singleUrl: function (item) {
            return '#!/single/' + item.id;
        },
        seach: function () {
            $scope.page = 1;
            $scope.data.list();
        },
        trashGroup: function (id)
        {
            if (confirm('Bạn có muốn xóa nhóm này không?'))
            {
                $groupService.actions.delete(id).then(function (resp) {
                    $.notify("Xóa thành công!", "success");
                    $scope.data.list();
                }, function (errors) {
                    console.log(errors);
                });
            }
        }
    };

    $scope.data.list();
});