ngApp.factory('$addressService', function ($rootScope, $http, $httpParamSerializer)
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
    
    //action city
    service.action.listCity = function(data){
        var url = SiteUrl + '/rest/address_city?' + $httpParamSerializer(data) + '&random='+new Date().getTime();
        return $http.get(url);
    };
    
    service.action.insertCity = function(data){
        var url = SiteUrl + '/rest/address_city';
        return $http.post(url, data);
    };
    
    service.action.updateCity = function(id, data){
        data.id = id;
        var url = SiteUrl + '/rest/address_city/' + id;
        return $http.put(url, data);
    };
    
    service.action.deleteCity = function(id){
        var url = SiteUrl + '/rest/address_city/' + id;
        return $http.delete(url);
    };
    
    service.action.infoCity = function(id){
        var url = SiteUrl + '/rest/address_city/' + id;
        return $http.get(url);
    };
    
    //action district
    service.action.listDistrict = function(data){
        var url = SiteUrl + '/rest/address_district?' + $httpParamSerializer(data);
        return $http.get(url);
    };
    
    service.action.insertDistrict = function(data){
        var url = SiteUrl + '/rest/address_district';
        return $http.post(url, data);
    };
    
    service.action.updateDistrict = function(id, data){
        data.id = id;
        var url = SiteUrl + '/rest/address_district/' + id;
        return $http.put(url, data);
    };
    
    service.action.deleteDistrict = function(id){
        var url = SiteUrl + '/rest/address_district/' + id;
        return $http.delete(url);
    };
    
    service.action.infoDistrict = function(id){
        var url = SiteUrl + '/rest/address_district/' + id;
        return $http.get(url);
    };
    
    //action village
    service.action.listVillage = function(data){
        var url = SiteUrl + '/rest/address_village?' + $httpParamSerializer(data);
        return $http.get(url);
    };
    
    service.action.insertVillage = function(data){
        var url = SiteUrl + '/rest/address_village';
        return $http.post(url, data);
    };
    
    service.action.updateVillage = function(id, data){
        data.id = id;
        var url = SiteUrl + '/rest/address_village/' + id;
        return $http.put(url, data);
    };
    
    service.action.deleteVillage = function(id){
        var url = SiteUrl + '/rest/address_village/' + id;
        return $http.delete(url);
    };
    
    service.action.infoVillage = function(id){
        var url = SiteUrl + '/rest/address_village/' + id;
        return $http.get(url);
    };
    
    //action street
    service.action.listStreet = function(data){
        var url = SiteUrl + '/rest/address_street?' + $httpParamSerializer(data);
        return $http.get(url);
    };
    
    service.action.insertStreet = function(data){
        var url = SiteUrl + '/rest/address_street';
        return $http.post(url, data);
    };
    
    service.action.updateStreet = function(id, data){
        data.id = id;
        var url = SiteUrl + '/rest/address_street/' + id;
        return $http.put(url, data);
    };
    
    service.action.deleteStreet = function(id){
        var url = SiteUrl + '/rest/address_street/' + id;
        return $http.delete(url);
    };
    
    service.action.infoStreet = function(id){
        var url = SiteUrl + '/rest/address_street/' + id;
        return $http.get(url);
    };

    return service;
});