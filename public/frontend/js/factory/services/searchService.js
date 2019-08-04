ngApp.factory('$searchService', function ($http)
{
    var service = {
        action: {},
        data: {}
    };

    //action
    service.action.getParamsSearch = function (str) {
        var url = SiteUrl + '/rest/frontend/getParamsSearch?' + str;
        return $http.get(url);
    };

    return service;
});