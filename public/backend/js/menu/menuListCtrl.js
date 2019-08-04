ngApp.controller('menuListCtrl', function ($scope, $menuService, $apply, $location)
{
    $scope.data = {
        listPosition: {},
        listMenu: {},
        positioInfo: {},
    };
    $scope.modalPositionMenu;
    $scope.errors = [];//Cờ lưu lỗi phát sinh nếu có

    //Load danh sach vi tri
    $scope.actions = {
        hasError: function (code)
        {
            return $scope.errors[code] ? true : false;
        },
        showError: function (code)
        {
            return $scope.errors[code] ? $scope.errors[code][0] : '';
        },
        getAllMenuPosition: function ()
        {
            $menuService.action.listPosition().then(function (resp) {
                $apply(function () {
                    $scope.data.listPosition = resp.data;
                    if (!$scope.data.positioInfo.id && resp.data)
                    {
                        $scope.data.positioInfo = Object.values(resp.data)[0];
                    }
                    $scope.actions.showListMenu($scope.data.positioInfo);
                });
            }, function (error) {
                console.log(error)
            });
        },
        //load danh sach menu con
        showListMenu: function (positioInfo) {
            $scope.data.positioInfo = positioInfo;
            $menuService.action.listMenu(positioInfo.id).then(function (resp) {
                $apply(function () {
                    $scope.data.listMenu = resp.data;
                });
            }, function (error) {
                console.log(error);
                $.notify("Xảy ra lỗi hiển thị danh sách menu, Bạn vui lòng tải lại trang và thao tác lại!", "error");
            });
        },
        singlePositionMenu: function (positionInfo)
        {
            $scope.errors = [];
            $scope.data.positioInfo = angular.copy(positionInfo);
            $($scope.modalPositionMenu).modal('show');
        },
        editPosition: function ()
        {
            $menuService.action.updatePosition($scope.data.positioInfo.id, $scope.data.positioInfo.name).then(function (resp) {
                $scope.actions.getAllMenuPosition();
                $($scope.modalPositionMenu).modal('hide');
            }, function (error) {
                $scope.errors = error.data;
            });
        }
        , deletePosition: function (positionID)
        {
            if (!confirm('Xác nhận xóa vị trí menu đã chọn?'))
            {
                return false;
            }
            $menuService.action.deletePosition(positionID).then(function (resp) {
                $scope.actions.getAllMenuPosition();
                $($scope.modalPositionMenu).modal('hide');
            }, function (error) {
                console.log(error);
                $.notify("Xóa vị trí menu thất bại, Bạn vui lòng tải lại trang và thao tác lại!", "error");
            });
        },
        addNewPosition: function ()
        {
            $menuService.action.insertPosition($scope.data.positioInfo.name).then(function (resp) {
                $scope.actions.getAllMenuPosition();
                $($scope.modalPositionMenu).modal('hide');
            }, function (error) {
                $scope.errors = error.data;
                console.log(error);
            });
        }
        , singleMenu: function (positionID, menuID)
        {
            $location.path('/single/' + positionID + '/' + menuID);
        },
        deleteMenu: function (menuID)
        {
            if (!confirm('Xác nhận xóa menu đã chọn?'))
            {
                return false;
            }

            $menuService.action.deleteMenu(menuID).then(function (resp) {
                $scope.actions.getAllMenuPosition();
                $($scope.modalPositionMenu).modal('hide');
            }, function (error) {
                $scope.errors = error.data;
                console.log(error);
                $.notify("Xóa menu thất bại, Bạn vui lòng tải lại trang và thao tác lại!", "error");
            });
        }

    }


    $scope.actions.getAllMenuPosition();
});