ngApp.factory('$feedbackService', function ($rootScope, $http, $httpParamSerializer)
{
    var service = {
        action: {},
        data: {},
    };
    service.data = {
        update: function (name, order, status) {
            this.name = name;
            this.order = order;
            this.status = status;
        },
        list: function (freeText, page, pageSize) {
            this.freeText = freeText;
            this.page = page;
            this.pageSize = pageSize;
        }
    };

    //action
    service.action.insert = function (data) {
        var url = SiteUrl + '/rest/feedback';
        return $http.post(url, data);
    };

    service.action.update = function (id, data) {
        var url = SiteUrl + '/rest/feedback/' + id;
        return $http.put(url, data);
    };

    service.action.delete = function (id) {
        var url = SiteUrl + '/rest/feedback/' + id;
        return $http.delete(url);
    };

    service.action.info = function (id) {
        var url = SiteUrl + '/rest/feedback/' + id;
        return $http.get(url);
    };

    service.action.list = function (data) {
        var url = SiteUrl + '/rest/feedback?' + $httpParamSerializer(data);
        return $http.get(url);
    };


    //############FeedbackPost##########
    service.action.ListFdPost = function (filter)
    {
        var url = SiteUrl + '/rest/post/feedback?' + $httpParamSerializer(filter);
        return $http.get(url);
    }
    service.action.FdPostInfo = function (fdPostID)
    {
        var url = SiteUrl + '/rest/post/feedback/' + fdPostID;
        return $http.get(url);
    }
    service.action.readedFdPost = function (fdPostID)
    {
        var url = SiteUrl + '/rest/post/feedback/' + fdPostID;
        return $http.put(url);
    }
    service.action.deleteFdPost = function (fdPostID)
    {
        var url = SiteUrl + '/rest/post/feedback/' + fdPostID;
        return $http.delete(url);
    }
    return service;
});