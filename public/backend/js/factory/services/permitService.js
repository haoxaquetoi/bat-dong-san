ngApp.factory('$permitService', function ($rootScope, $http) {

    var service = {
        actions: {}
    };

    service.actions.listPermit = function ()
    {
        var url = SiteUrl + '/rest/permit';
        return $http.get(url);
    }
    
    service.actions.listPermitOfGroup = function(id){
        var url = SiteUrl + '/rest/permit/group/' + id;
        return $http.get(url);
    }
    
    return service;
});