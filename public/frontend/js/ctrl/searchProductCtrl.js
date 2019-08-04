ngApp.controller('searchProductCtrl', function ($scope)
{
    var query = window.location.search.substring(1);
    var searchObject = parse_query_string(query);

    $scope.paramsUrl = {
        cs: searchObject.cs || ''
    };
    console.log($scope.paramsUrl);

    $scope.action = {
        search: function (cs) {
            if (cs !== searchObject.cs) {
                searchObject.cs = cs;
                var str = jQuery.param(searchObject);
                window.location.href = SiteUrl + '/tim-kiem-tin-bat-dong-san?' + str;
            }
        }
    };
});