var backendApp ={};                                   
backendApp.ngApp = angular.module('ngApp', []);
backendApp.ngApp.factory('$apply', ['$rootScope', function ($rootScope) {
        return function (fn) {
            setTimeout(function () {
                $rootScope.$apply(fn);
            });
        };
}]);
          