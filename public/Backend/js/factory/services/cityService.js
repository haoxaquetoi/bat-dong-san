ngApp.factory('$cityService', function ($rootScope, $http, $httpParamSerializer)
{
    var service = {
        actions: {}
    };

    service.actions.insert = function (params)
    {
        var url = SiteUrl + '/rest/address_city';
        return $http.post(url, params);
    };
    service.actions.info = function (id)
    {
        var url = SiteUrl + '/rest/address_city/' + id;
        return $http.get(url);
    };

    service.actions.update = function (params)
    {
        var url = SiteUrl + '/rest/address_city';
        return $http.put(url, params);
    };
    service.actions.list = function (data)
    {
        var url = SiteUrl + '/rest/address_city?' + $httpParamSerializer(data);
        return $http.get(url);
    };
    service.actions.delete = function (id)
    {
        var url = SiteUrl + '/rest/address_city/' + id;
        return $http.delete(url);
    };

    return service;
});