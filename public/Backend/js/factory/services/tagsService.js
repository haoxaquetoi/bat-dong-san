ngApp.factory('$tagsService', function ($rootScope, $http)
{
    var service = {
        actions: {}
    };

    service.actions.getAll = function ()
    {
        var url = SiteUrl + '/rest/tags';
        return $http.get(url);
    }
    return service;
});