ngApp.factory('$crawlerService', function ($rootScope, $http)
{
    var service = {
        actions: {}
    };

    service.actions.getAllCrawler = function (filter)
    {
        filter = filter ? filter : {};
        var url = SiteUrl + '/rest/crawler';
        return $http.get(url, {params: filter});
    }
    service.actions.add = function (params)
    {
        var url = SiteUrl + '/rest/crawler/addnew';
        return $http.post(url, params);
    }
    service.actions.edit = function (params)
    {
        var url = SiteUrl + '/rest/crawler/edit';
        return $http.put(url, params);
    }
    service.actions.publish = function (params)
    {
        var url = SiteUrl + '/rest/crawler/publish';
        return $http.put(url, params);
    }
    service.actions.delete = function (id)
    {
        var url = SiteUrl + '/rest/crawler/' + id;
        return $http.delete(url);
    }
    return service;
});