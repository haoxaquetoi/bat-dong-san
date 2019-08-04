ngApp.controller('changeUserInfoCtrl', function ($scope, $userService, $rootScope, $apply, $window) {

    $scope.userInfo = {}; //Thông tin người dùng
    $scope.errors = {};//Object chứa lỗi

    $scope.actions = {
        getCurUser: function () {
            $userService.action.authUserInfo().then(function (resp) {
                if (resp.status == 200)
                {
                    $apply(function () {
                        $scope.userInfo = resp.data;
                    });
                }
                else
                {
                    $.notify("Xảy ra lỗi xác thực, bạn vui lòng thoát ra và đăng nhập lại!", "error");
                }
            });
        },
        editUser: function (modalTarget)
        {
            $scope.errors = {};
            $userService.action.editUser($scope.userInfo).then(function (resp) {
                if (resp.status == 200)
                {
                    $window.location.reload();
                }
                else
                {
                    $apply(function () {
                        $scope.errors = resp.data;
                    });
                }

            }, function (errors) {
                $apply(function () {
                    $scope.errors = errors;
                });
            });
        },
        cancelChangeUserInfo: function (modalTarget) {
            $scope.actions.getCurUser();
            $(modalTarget).modal('hide');
        },
        hasError: function (code)
        {
            return $scope.errors[code] ? true : false;
        },
        showError: function (code)
        {
            return $scope.errors[code] ? $scope.errors[code][0] : '';
        }
    }
    $scope.actions.getCurUser();
});


