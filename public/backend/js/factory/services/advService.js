ngApp.factory('$advService', function ($rootScope, $http, $httpParamSerializer)
{
    var service = {
        action: {},
        data: {},
    };
    service.data.list = function(freeText, begin_date, end_date, page, pageSize){
        this.freeText = freeText;
        this.begin_date = begin_date;
        this.end_date = end_date;
        this.page = page || 1;
        this.pageSize = pageSize || 15;
    };
    
    service.data.update = function(name, url, begin_date, end_date, file_path, status){
        this.name = name;
        this.url = url;
        this.begin_date = begin_date;
        this.end_date = end_date;
        this.file_path = file_path;
        this.status = status;
    };
    
    //action
    service.action.list = function(data){
        var url = SiteUrl + '/rest/adv?' + $httpParamSerializer(data);
        return $http.get(url);
    };
    
    service.action.insert = function(data){
        var url = SiteUrl + '/rest/adv';
        return $http.post(url, data);
    };
    
    service.action.update = function(id, data){
        data.id = id;
        var url = SiteUrl + '/rest/adv';
        return $http.put(url, data);
    };
    
    service.action.delete = function(id){
        var url = SiteUrl + '/rest/adv/' + id;
        return $http.delete(url);
    };
    
    service.action.info = function(id){
        var url = SiteUrl + '/rest/adv/' + id;
        return $http.get(url);
    };

    return service;
});