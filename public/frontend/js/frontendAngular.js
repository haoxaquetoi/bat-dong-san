var ngApp = angular.module('ngApp', ['bw.paging'])
        .filter('trustAsResourceUrl', ['$sce', function ($sce) {
                return function (val) {
                    return $sce.trustAsResourceUrl(val);
                };
            }])
        .filter('trustedHtml', ['$sce', function ($sce) {
                return function (text) {
                    return $sce.trustAsHtml(text);
                };
            }]);
