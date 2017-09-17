ngApp.factory('$groupService', function ($rootScope, $http, $httpParamSerializer) {

    var service = {
        actions: {},
        data: {}
    };
    
    
    service.data.update = function(id, name, code, arrUser, arrPermit){
        this.id = id;
        this.name = name;
        this.code = code;
        this.arrUser = arrUser;
        this.arrPermit = arrPermit;
    }
    
    /**
     * Lay danh sach user
     * @returns {undefined}
     */
    service.actions.update = function (data)
    {
        var url = SiteUrl + '/rest/group';
        
        var method = 'POST';
        if(parseInt(data.id) > 0){
            method = 'PUT';
        }
        
        return $http({
            method: method,
            url: url,
            data: data
        });
    };
    
    service.actions.list = function(page, freeText){
        var data = {}
        var freeText = freeText || '';
        var page = page || 1;
        data.freeText = freeText;
        data.page = page;
        
        var url = SiteUrl + '/rest/group?' + $httpParamSerializer(data);
        
        return $http.get(url);
    }
    
    service.actions.info = function(id){
        var url = SiteUrl + '/rest/group/' + id;
        
        return $http.get(url);
    }
    
    service.actions.delete = function(id){
        var url = SiteUrl + '/rest/group/' + id;
        return $http.delete(url);
    }
    
    return service;
});