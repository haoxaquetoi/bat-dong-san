ngApp.factory('$categoryService', function ($rootScope, $http)
{
    var service = {
        actions: {}
    };

    service.actions.insertCategory = function (params)
    {
        var url = SiteUrl + '/rest/category';
        return $http.post(url, params);
    }
    service.actions.updateCategory = function (params)
    {
        var url = SiteUrl + '/rest/category';
        return $http.put(url, params);
    }
    service.actions.getAllCategory = function (params)
    {
        var url = SiteUrl + '/rest/category';
        return $http.get(url,{params:params});
    }
    service.actions.deleteCategory = function (catID)
    {
        var url = SiteUrl + '/rest/category/' + catID;
        return $http.delete(url);
    }

    return service;
});