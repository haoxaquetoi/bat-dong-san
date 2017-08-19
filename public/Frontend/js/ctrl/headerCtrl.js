ngApp.controller('headerCtrl', function ($scope, $rootScope, $apply, $widgetService, $searchService)
{
    var query = window.location.search.substring(1);
    var searchObject = parse_query_string(query);

    $scope.paramsUrl = {
        kw: searchObject.kw || '',
        cg: searchObject.cg || '',
        ct: searchObject.ct || '',
        pmi: searchObject.pmi || '',
        pma: searchObject.pma || '',
        dh: searchObject.dh || '',
        dt: searchObject.dt || '',
        vil: searchObject.vil || '',
        fami: searchObject.fami || '',
        fama: searchObject.fama || '',
        rn: searchObject.rn || ''
    };

    $scope.positionCode = 'header';
    $scope.widgetData = {};

    $scope.data = {
        widget: function () {
            $widgetService.action.widget($scope.positionCode).then(function (resp) {
                $apply(function () {
                    $scope.widgetData = resp.data;
                });
            }).catch(function (err) {
                console.log(err);
            });
        },
        getParamsSearch: function () {
            $searchService.action.getParamsSearch().then(function (resp) {
                $apply(function () {
                    $rootScope.paramsSearch = resp.data;
                    console.log($rootScope.paramsSearch)
                });
            }).catch(function (err) {
                console.log(err);
            });
        }
    };
    $scope.action = {
        search: function (cs) {
            searchObject.kw = $scope.paramsUrl.kw;
            searchObject.cg = $scope.paramsUrl.cg;
            searchObject.ct = $scope.paramsUrl.ct;
            searchObject.pmi = $scope.paramsUrl.pmi;
            searchObject.pma = $scope.paramsUrl.pma;
            searchObject.dh = $scope.paramsUrl.dh;
            searchObject.dt = $scope.paramsUrl.dt;
            searchObject.vil = $scope.paramsUrl.vil;
            searchObject.fami = $scope.paramsUrl.fami;
            searchObject.fama = $scope.paramsUrl.fama;
            searchObject.rn = $scope.paramsUrl.rn;
            searchObject.cs = cs;
            
            var str = jQuery.param(searchObject);
            window.location.href = SiteUrl + '/tim-kiem?' + str;
        }
    };

    $scope.data.widget();
    $scope.data.getParamsSearch();
});