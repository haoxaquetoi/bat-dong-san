ngApp.factory('$articleService', function ($rootScope, $http)
{
    var service = {
        actions: {}
    };

    service.actions.insert = function (params)
    {
        var url = SiteUrl + '/rest/article';
        return $http.post(url, params);
    }
    service.actions.edit = function (params)
    {
        var url = SiteUrl + '/rest/article';
        return $http.put(url, params);
    }
    service.actions.editCrawler = function (params)
    {
        var url = SiteUrl + '/rest/articleCrawler';
        return $http.put(url, params);
    }
    service.actions.getAll = function (params)
    {
        var url = SiteUrl + '/rest/article';
        return $http.get(url, {params: params});
    }
    service.actions.delete = function (id)
    {
        var url = SiteUrl + '/rest/article/' + id;
        return $http.delete(url);
    }
    service.actions.undelete = function (id)
    {
        var url = SiteUrl + '/rest/article/undelete' + id;
        return $http.put(url);
    }
    service.actions.updateSticky = function (id)
    {

        var url = SiteUrl + '/rest/article/updateSticky/' + id;
        return $http.put(url);
    }
    service.actions.updateCensored = function (id)
    {

        var url = SiteUrl + '/rest/article/updateCensored/' + id;
        return $http.put(url);
    }
    service.actions.getSingleArticle = function (id)
    {
        var url = SiteUrl + '/rest/article/' + id;
        return $http.get(url);
    }
    service.actions.getAllPostDate = function ()
    {
        var url = SiteUrl + '/rest/article/getAllPostDate';
        return $http.get(url);
    }
    service.actions.getFeedback = function (postID)
    {
        var url = SiteUrl + '/rest/article/getFeedback/' + postID;
        return $http.get(url);
    }
    service.actions.doReadedFB = function (postID)
    {
        var url = SiteUrl + '/rest/article/doReadedFB/' + postID;
        return $http.put(url);
    }
    return service;
});