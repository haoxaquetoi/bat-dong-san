ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/admin/wards/list',
                controller: 'wardsListCtrl'
            })
            .when('/single/:id', {
                templateUrl: SiteUrl + '/admin/wards/single',
                controller: 'wardsSingleCtrl'
            })
            .otherwise({redirectTo: '/'});
});