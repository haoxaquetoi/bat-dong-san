ngApp.controller('rightSidebarSingleCtrl', function ($scope)
{
    var query = window.location.search.substring(1);
    var searchObject = parse_query_string(query);

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
            window.location.href = SiteUrl + '/tim-kiem?' + str;
        }
    };
});