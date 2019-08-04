ngApp.factory('$groupUserService', function ($rootScope, $http) {

    var service = {
        actions: {},
        data: {}
    };
    
    
    /**
     * Lay danh sach user
     * @returns {undefined}
     */
    service.actions.getUser = function (groupID)
    {
        var url = SiteUrl + '/rest/groupUser/' + groupID;
        
        return $http.get(url);
    };
    
    
    
    return service;
});