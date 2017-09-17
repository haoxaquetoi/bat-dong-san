ngApp.factory('$ouService', function ($rootScope, $http) {

    var service = {
        actions: {}
    };

    /**
     * Lay danh sach user
     * @returns {undefined}
     */
    service.actions.getAllOu = function (parent_id)
    {
        var params = {
            parent_id: parent_id || null
        };
        var url = SiteUrl + '/rest/ou/getAllOu';
        return $http.get(url, {params: params});
    }
    /**
     * Lay danh sach user
     * @returns {undefined}
     */
    service.actions.addNewOu = function (params)
    {
        var url = SiteUrl + '/rest/ou/addNewOu';
        return $http.post(url, params);
    }
    
    service.actions.editOu = function (params)
    {
        var url = SiteUrl + '/rest/ou/editOu';
        return $http.put(url, params);
    }
    return service;
});