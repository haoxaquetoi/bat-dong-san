ngApp.factory('$widgetService', function ($rootScope, $http)
{
    var service = {
        action: {},
        data: {},
    };
    
    
    
    //action
    service.action.widget = function(positionCode){
        var url = SiteUrl + '/rest/frontend/widget/' + positionCode;
        return $http.get(url);
    };
    
    return service;
});