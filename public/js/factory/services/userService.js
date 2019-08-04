ngApp.factory('$userService', function ($rootScope, $http) {

    var service = {
        data: {},
        action: {},
    };

    service.action.userInfo = function (id) {
        var url = SiteUrl + '/rest/user/' + id;
        return new Promise(function (resolve) {
            $http({
                method: 'GET',
                url: url
            }).then(function successCallback(response) {
                resolve(response);
            }, function errorCallback(error) {
                resolve(error);
            });
        });
    }
    service.action.editUser = function (userInfo)
    {
        var url = SiteUrl + '/rest/user/edit';
        return new Promise(function (resolve) {
            $http.put(url, userInfo).then(function (response) {
                resolve(response);
            }, function (error) {
                resolve(error);
            });
        });
    }
    /**
     * Thêm mới usert
     * @param {type} userInfo
     * @returns {Promise}
     */
    service.action.insert = function (userInfo)
    {
        var url = SiteUrl + '/rest/user/insertUser';
        return $http.post(url, userInfo);
    }
    /**
     * Xóa thông tin người dùng
     * @param {int} id
     * @returns {undefined}
     */
    service.action.trashUser = function (id) {
        var url = SiteUrl + '/rest/user/trashUser';
        return $http.put(url, {id: id});
    }
    /**
     * Xóa vĩnh viễn người sử dụng đã chọn
     * @param {int} id Mã người dùng
     * @returns {unresolved}
     */
    service.action.deleteUser = function (id) {
        var url = SiteUrl + '/rest/user/deleteUser';
        var params = {id: id};
        return $http.delete(url, {params: params});
    }

    service.action.publishUser = function (id) {
        var url = SiteUrl + '/rest/user/publishUser';
        return $http.put(url, {id: id});
    }
    /**
     * 
     * @returns {Promise}
     */
    service.action.authUserInfo = function () {
        var url = SiteUrl + '/rest/user/curUser';
        return new Promise(function (resolve) {
            $http({
                method: 'GET',
                url: url
            }).then(function successCallback(response) {
                resolve(response);
            }, function errorCallback(error) {
                resolve(error);
            });
        });
    }

    service.getAuthUserInfo = function () {
        if (jQuery.hasData($rootScope.AuthUserInfo))
        {
            return $rootScope.AuthUserInfo;
        }
        else
        {
            service.action.authUserInfo().then(function (data) {
                $rootScope.AuthUserInfo = data;
            });
        }
    };

    /**
     * Lay danh sach user
     * @returns {undefined}
     */
    service.action.getAllUser = function (params)
    {
        params = {
            ou_id: params.ou_id || 0,
        };
        var url = SiteUrl + '/rest/user/getAllUser';
        return $http.get(url, {params: params});
    }
    /**
     * Lay danh sach user
     * @returns {undefined}
     */
    service.action.countUser = function ()
    {
        var url = SiteUrl + '/rest/user/countUser';
        return $http.get(url);
    }


    return service;
});