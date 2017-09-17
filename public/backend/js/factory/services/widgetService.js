ngApp.factory('$widgetService', function ($rootScope, $http)
{
    var service = {
        action: {},
        data: {},
    };
    
    service.data.insertItem = function(position_code, type, value, order){
        this.position_code = position_code;
        this.type = type;
        this.value = value;
        this.order = order;
    };
    
    service.data.reOrderItem = function(id, position_code, order){
        this.id = id;
        this.position_code = position_code;
        this.order = order;
    };
    
    
    //action
    service.action.listType = function(){
        var url = SiteUrl + '/rest/widget/type';
        return $http.get(url);
    };
    
    service.action.listPosition = function(){
        var url = SiteUrl + '/rest/widget/position';
        return $http.get(url);
    };
    
    service.action.insertItem = function(data){
        var url = SiteUrl + '/rest/widget/item';
        return $http.post(url, data);
    };
    
    service.action.updateItem = function(id, value){
        data = {
            value: value
        };
        var url = SiteUrl + '/rest/widget/item/' + id;
        return $http.put(url, data);
    };
    
    service.action.deleteItem = function(id){
        var url = SiteUrl + '/rest/widget/item/' + id;
        return $http.delete(url);
    };
    
    service.action.reOrderItem = function(data){
        var url = SiteUrl + '/rest/widget/item/order';
        return $http.put(url, data);
    };
    
    service.action.cache = function(){
        var url = SiteUrl + '/rest/widget/cache';
        return $http.put(url, {});
    };
    

    return service;
});