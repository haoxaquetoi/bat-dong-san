ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/admin/menu/list',
                controller: 'menuListCtrl'
            })
            .when('/single/:postionID/:id', {
                templateUrl: SiteUrl + '/admin/menu/single',
                controller: 'menuSingleCtrl'
            })
            .otherwise({redirectTo: '/'});
});