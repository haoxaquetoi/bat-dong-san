ngApp.controller('rightSidebarSearch', function ($scope, $widgetService)
{
    var query = window.location.search.substring(1);
    var searchObject = parse_query_string(query);
    
    $scope.positionCode = 'categorySideBar';
    $scope.widgetData = {};
    
    $scope.paramsUrl = {
        cg: searchObject.cg || '',
        ct: searchObject.ct || '',
        pmi: searchObject.pmi || '',
        pma: searchObject.pma || '',
        dh: searchObject.dh || '',
        dt: searchObject.dt || '',
        vil: searchObject.vil || '',
        st: searchObject.st || '',
        fami: parseInt(searchObject.fami) || '',
        fama: parseInt(searchObject.fama) || '',
        sn: searchObject.sn || '',
        rn: searchObject.rn || ''
    };

    $scope.action = {
        search: function () {
            searchObject.cg = $scope.paramsUrl.cg;
            searchObject.ct = $scope.paramsUrl.ct;
            searchObject.pmi = $scope.paramsUrl.pmi;
            searchObject.pma = $scope.paramsUrl.pma;
            searchObject.dh = $scope.paramsUrl.dh;
            searchObject.dt = $scope.paramsUrl.dt;
            searchObject.vil = $scope.paramsUrl.vil;
            searchObject.st = $scope.paramsUrl.st;
            searchObject.fami = $scope.paramsUrl.fami;
            searchObject.fama = $scope.paramsUrl.fama;
            searchObject.sn = $scope.paramsUrl.sn;
            searchObject.rn = $scope.paramsUrl.rn;
            
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