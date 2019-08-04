ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/admin/city/list',
                controller: 'cityListCtrl'
            })
            .when('/single/:id', {
                templateUrl: SiteUrl + '/admin/city/single',
                controller: 'citySingleCtrl'
            })
            .otherwise({redirectTo: '/'});
});