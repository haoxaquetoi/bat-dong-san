ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/admin/village/list',
                controller: 'villageListCtrl'
            })
            .when('/single/:id', {
                templateUrl: SiteUrl + '/admin/village/single',
                controller: 'villageSingleCtrl'
            })
            .otherwise({redirectTo: '/'});
});