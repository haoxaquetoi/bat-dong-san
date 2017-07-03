ngApp.factory('$crawlerService', function ($rootScope, $http)
{
    var service = {
        actions: {}
    };

    service.actions.getAllCrawler = function ()
    {
        var url = SiteUrl + '/rest/crawler';
        return $http.get(url);
    }

    return service;
});