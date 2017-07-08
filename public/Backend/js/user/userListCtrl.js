ngApp.controller('userListCtrl', function ($scope, $apply, $userService, $ouService, $location)
{
    $scope.chossePermitModal;
    $scope.chosseGroupModal;
    $scope.data =
    {
        users: {},
        ou: {},
        singleOu: {},
        ouChildren: {},
        singleUser: {},
        isEditUser: false,
        isEditOu: false
    };



    $scope.errors = {};
    $scope.actions = {
        hasError: function (code)
        {
            return $scope.errors[code] ? true : false;
        },
        showError: function (code)
        {
            return $scope.errors[code] ? $scope.errors[code][0] : '';
        },
        /**
         * Thêm mới đơn vị
         * @returns {undefined}
         */
        singleOu: function (targetModalSingleOu, ouInfo)
        {
            $scope.errors = {};
            ouInfo = ouInfo || {parent_id: '0'};
            $scope.data.singleOu = angular.copy(ouInfo);
            $(targetModalSingleOu).modal('show');
        },
        /**
         * Thêm mới đơn vị
         * @returns {undefined}
         */
        addNewOu: function (targetModalSingleOu)
        {
            $ouService.actions.addNewOu($scope.data.singleOu).then(function (resp) {
                $(targetModalSingleOu).modal('hide');
                if (!resp.status)
                {
                    $.notify("Xảy ra lỗi, bạn vui lòng tải lại trang sau đó thao tác lại", "error");
                }
                else
                {
                    //reload data
                    $scope.actions.getAllOu();
                }
            }, function (errors) {
                $apply(function () {
                    $scope.errors = errors.data;
                });
            });
        },
        /**
         * Lưa chọn đơn vị/phòng ban xem danh sách người sử dụng
         * @param {type} ou
         * @returns {undefined}
         */
        chooseOu: function (ouInfo)
        {
            ouInfo = ouInfo || {id: 0, parent_id: '0'};
            $apply(function () {
                $scope.data.singleOu = angular.copy(ouInfo);
                $scope.actions.getAllOuChildren();

            });
        },
        editOu: function (targetModalSingleOu)
        {
            var params = angular.copy($scope.data.singleOu);
            $ouService.actions.editOu(params).then(function (resp) {
                $(targetModalSingleOu).modal('hide');
                if (!resp.status)
                {
                    $.notify("Xảy ra lỗi, bạn vui lòng tải lại trang sau đó thao tác lại", "error");
                }
                else
                {
                    //reload data
                    $scope.actions.getAllOu();
                }
            }, function (errors) {
                $apply(function () {
                    $scope.errors = errors.data;
                });
            });
        },
        /**
         * Lay danh sach ou
         * @returns {undefined}
         */
        getAllOu: function ()
        {
            $scope.data.ou = {};
            $ouService.actions.getAllOu().then(function (resp) {
                $scope.data.ou = resp.data;
            }, function (error) {
                console.log(error);
            });
            $scope.actions.getAllOuChildren(0);
        },
        /**
         * Load danh sach don vi con theo don vi dang active
         * @param {type} parent_id
         * @returns {undefined}
         */
        getAllOuChildren: function (parent_id)
        {
            $scope.data.ouChildren = {};
            var parent_id = $scope.data.singleOu.id || '0';
            $ouService.actions.getAllOu(parent_id).then(function (resp) {
                $apply(function () {
                    $scope.data.ouChildren = resp.data;
                });
            }, function (error) {
                console.log(error);
            });
            $scope.actions.getAllUser(parent_id);
        },
        /**
         * Lay danh sach thong tin nguoi su dung
         * @param {object} filter Dieu kien loc
         * @returns {undefined}
         */
        getAllUser: function (parent_id) {
            $scope.data.users = {};
            var params = {
                ou_id: parent_id
            };
            $userService.action.getAllUser(params).then(function (resp) {
                if (resp.status == 200)
                {
                    $apply(function () {
                        $scope.data.users = resp.data;
                    });
                }
                else
                {
                    $.notify("Xảy ra lỗi, bạn vui lòng tải lại trang sau đó thao tác lại", "error");
                }
            }, function (error) {

                $.notify("Xảy ra lỗi, bạn vui lòng tải lại trang sau đó thao tác lại", "error");
            });
        },
        /**
         * Thêm mới người sử dụng
         * @returns {undefined}
         */
        addNewUser: function (targetModalEditUser) {
            $userService.action.insert($scope.data.users.userInfoSelected).then(function (resp) {
                $scope.actions.getAllUser();
                $(targetModalEditUser).modal('hide');
            }, function (errors) {
                $apply(function () {
                    $scope.errors = errors.data;
                });
            });
        },
        /**
         * Hien thi modal sua thong tin  nguoi dung
         * @returns {undefined}
         */
        showModalSingleUser: function (targetModalEditUser, userInfo)
        {
            userInfo = userInfo || {active: 1};
            $scope.errors = {};
            $scope.data.users.userInfoSelected = angular.copy(userInfo);
            $(targetModalEditUser).modal('show');
        },
        /**
         * Gui thong tin sua thong tin nguoi dung
         * @returns {undefined}
         */
        updateUser: function (targetModalEditUser)
        {
            $scope.errors = {};
            $userService.action.editUser($scope.data.users.userInfoSelected).then(function (resp) {
                if (resp.status == 200)
                {
                    $scope.actions.getAllUser();
                    $(targetModalEditUser).modal('hide');
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
        /**
         * Xóa thông tin người sủ dụng
         * @returns {undefined}
         */
        trashUser: function (userID) {
            if (confirm('Xác nhận xóa người dùng đã chọn?'))
            {
                $userService.action.trashUser(userID).then(function (resp) {
                    $scope.actions.getAllUser();
                }, function (errors) {
                    $.notify(errors.data, "error");
                });
            }
        },
        /**
         * Xóa vĩnh viễn người sử dụng
         * @param {type} userId
         * @returns {undefined}
         */
        deleteUser: function (userId)
        {
            if (confirm('Xác nhận xóa vĩnh viễn người dùng đã chọn?'))
            {
                $userService.action.deleteUser(userId).then(function (resp) {
                    $scope.actions.getAllUser();
                }, function (errors) {
                    $.notify(errors.data, "error");
                });
            }
        },
        /**
         * Khôi phục user from trash
         * @returns {undefined}
         */
        publishUser: function (userId) {
            if (confirm('Xác nhận khôi phục người dùng đã chọn?'))
            {
                $userService.action.publishUser(userId).then(function (resp) {
                    $scope.actions.getAllUser();
                }, function (errors) {
                    $.notify(errors.data, "error");
                });
            }
        },
        setSingleUser: function(userInfo){
            $apply(function(){
                $scope.data.singleUser = userInfo;
            });
        },
        //modal chosse permit
        showChossePermitModal: function(userInfo){
            $($scope.chossePermitModal).modal('show');
            $scope.actions.setSingleUser(userInfo);
            
        },
        doChossePermit: function(retVal)
        {
            var data = new $userService.data.updatePermit($scope.data.singleUser.id, retVal);
            $userService.action.updatePermit(data).then(function(resp){
                 $.notify("Cập nhật thành công!", "success");
            }, function(err){
                console.log(err);
            });
        },
        //modal chosse group
        showChosseGroupModal: function(userInfo){
            $($scope.chosseGroupModal).modal('show');
            $scope.actions.setSingleUser(userInfo);
        },
        doChosseGroup: function(retVal){
            var data = new $userService.data.updateGroup($scope.data.singleUser.id, retVal);
            $userService.action.updateGroup(data).then(function(resp){
                 $.notify("Cập nhật thành công!", "success");
            }, function(err){
                console.log(err);
            });
        }
    };
    $scope.actions.getAllOu();
});
