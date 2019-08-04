ngApp.factory('$articleService', function ($http)
{
    var service = {
        action: {},
        data: {}
    };

    //action
    service.action.updateListCare = function(artID){
        var url = SiteUrl + '/rest/frontend/updateListCare/' + artID;
        return $http.post(url);
    };
    
    service.action.getAllArticleCare = function(artID){
        var data = {
            artID: artID
        };
        var url = SiteUrl + '/rest/frontend/getAllArticleCare';
        return $http.get(url, {params: data});
    };
    
    service.action.checkArticleCare = function(artID){
        var url = SiteUrl + '/rest/frontend/checkArticleCare/' + artID;
        return $http.get(url);
    };
    
    return service;
});