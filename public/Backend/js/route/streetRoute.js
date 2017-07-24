ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/admin/street/list',
                controller: 'streetListCtrl'
            })
            .when('/single/:id', {
                templateUrl: SiteUrl + '/admin/street/single',
                controller: 'streetSingleCtrl'
            })
            .otherwise({redirectTo: '/'});
});