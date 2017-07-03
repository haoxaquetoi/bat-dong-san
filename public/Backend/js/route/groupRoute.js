ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/backend/group/list',
                controller: 'groupListCtrl'
            })
            .when('/single/:id', {
                templateUrl: SiteUrl + '/backend/group/single',
                controller: 'groupSingleCtrl'
            })
            .otherwise({redirectTo: '/'});
});