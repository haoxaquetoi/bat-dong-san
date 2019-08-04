ngApp.controller('rightSidebarSingleCtrl', function ($scope, $widgetService)
{
    var query = window.location.search.substring(1);
    var searchObject = parse_query_string(query);
    
    $scope.positionCode = 'articleSideBar';
    $scope.widgetData = {};
    
    $scope.paramsUrl = {
        cs: searchObject.cg || '',
        ad: searchObject.ad || '',
        pmi: searchObject.pmi || '',
        pma: searchObject.pma || ''
    };

    $scope.action = {
        search: function () {
            searchObject.cg = $scope.paramsUrl.cg;
            searchObject.pmi = $scope.paramsUrl.pmi;
            searchObject.pma = $scope.paramsUrl.pma;
            searchObject.ad = $scope.paramsUrl.ad;
            var str = jQuery.param(searchObject);
            window.location.href = SiteUrl + '/tim-kiem-tin-bat-dong-san?' + str;
        }
    };
    
    $scope.data = {
        widget: function(){
            $widgetService.action.widget($scope.positionCode).then(function(resp){
                $apply(function(){
                    $scope.widgetData = resp.data;
                    console.log(resp.data);
                });
            }).catch(function(err){
                console.log(err);
            });
        }
    };
    
    $scope.data.widget();
});