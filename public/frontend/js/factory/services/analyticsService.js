ngApp.factory('$analyticsService', function ($http)
{
    var service = {
        action: {},
        data: {}
    };

    //action
    service.action.getTotalVisitors = function(){
        var url = SiteUrl + '/rest/frontend/getTotalVisitors';
        return $http.get(url);
    };
    return service;
});