ngApp.factory('$articleService', function ($rootScope, $http)
{
    var service = {
        actions: {}
    };

    service.actions.insert = function (params)
    {
        var url = SiteUrl + '/rest/article';
        return $http.post(url, params);
    }
    service.actions.edit = function (params)
    {
        var url = SiteUrl + '/rest/article';
        return $http.put(url, params);
    }
    service.actions.getAll = function (params)
    {
        
        var url = SiteUrl + '/rest/article';
        return $http.get(url, {params:params});
    }
    return service;
});