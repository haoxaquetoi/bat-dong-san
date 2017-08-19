ngApp.factory('$searchService', function ($http)
{
    var service = {
        action: {},
        data: {}
    };

    //action
    service.action.getParamsSearch = function(){
        var url = SiteUrl + '/rest/frontend/getParamsSearch';
        return $http.get(url);
    };
    
    return service;
});