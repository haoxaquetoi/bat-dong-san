var ngApp = angular.module('ngApp', ['bw.paging', 'angularTreeview', 'ngRoute', 'slugifier', 'ngDraggable'])
        .filter('trustAsResourceUrl', ['$sce', function ($sce) {
                return function (val) {
                    return $sce.trustAsResourceUrl(val);
                };
            }]);
