ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/admin/district/list',
                controller: 'districtListCtrl'
            })
            .when('/single/:id', {
                templateUrl: SiteUrl + '/admin/district/single',
                controller: 'districtSingleCtrl'
            })
            .otherwise({redirectTo: '/'});
});