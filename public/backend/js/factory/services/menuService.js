ngApp.factory('$menuService', function ($rootScope, $http, $httpParamSerializer)
{
    var service = {
        action: {},
        data: {},
    };
    service.data.listMenu = function(freeText, page, pageSize){
        this.freeText = freeText;
        this.page = page || 1;
        this.pageSize = pageSize || 15;
    };
    
    service.data.updateMenu = function(name, type, position_id, parent, order, value){
        this.name = name;
        this.type = type;
        this.position_id = position_id;
        this.parent = parent;
        this.order = order;
        this.value = value;
    };
    
    service.data.reOrderMenu = function(id, parent, order){
        this.id = id;
        this.parent = parent;
        this.order = order;
    };
    
    //action
    service.action.insertPosition = function(name){
        var url = SiteUrl + '/rest/menu/position';
        return $http.post(url, {name: name});
    };
    
    service.action.updatePosition = function(id, name){
        var url = SiteUrl + '/rest/menu/position';
        return $http.put(url, {id: id, name: name});
    };
    
    service.action.deletePosition = function(id){
        var url = SiteUrl + '/rest/menu/position/' + id;
        return $http.delete(url);
    };
    
    service.action.listPosition = function(id){
        var url = SiteUrl + '/rest/menu/position';
        return $http.get(url);
    };
    
    service.action.insertMenu = function(data){
        var url = SiteUrl + '/rest/menu';
        return $http.post(url, data);
    };
    
    service.action.updateMenu = function(id, data){
        data.id = id;
        var url = SiteUrl + '/rest/menu';
        return $http.put(url, data);
    };
    
    service.action.deleteMenu = function(id){
        var url = SiteUrl + '/rest/menu/' + id;
        return $http.delete(url);
    };
    
    service.action.listMenu = function(positionId, data){
        var url = SiteUrl + '/rest/menu/' + positionId + '?' + $httpParamSerializer(data);
        return $http.get(url);
    };
    
    service.action.infoMenu = function(id){
        var url = SiteUrl + '/rest/menu/info/' + id;
        return $http.get(url);
    };
    
    service.action.reOrderMenu = function(data){
        var url = SiteUrl + '/rest/menu/order';
        return $http.put(url, data);
    };
    
    service.action.reOrderMenu = function(){
        var url = SiteUrl + '/rest/menu/type';
        return $http.get(url);
    };
    

    return service;
});