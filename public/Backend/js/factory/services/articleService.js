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
    return service;
});