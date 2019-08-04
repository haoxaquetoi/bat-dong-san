ngApp.factory('$settingService', function ($rootScope, $http)
{
    var service = {
        action: {},
        data: {},
    };
    
    //action
    service.action.list = function(){
        var url = SiteUrl + '/rest/setting';
        return $http.get(url);
    };
    
    service.action.update = function(key, value){
        var url = SiteUrl + '/rest/setting';
        return $http.put(url, {key: key, value: value});
    };
    
    service.action.info = function(key){
        var url = SiteUrl + '/rest/setting/' + key;
        return $http.get(url);
    };

    return service;
});