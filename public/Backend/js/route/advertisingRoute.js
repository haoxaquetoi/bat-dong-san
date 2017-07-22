ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/admin/advertising/list',
                controller: 'advertisingListCtrl'
            })
            .when('/single/:id', {
                templateUrl: SiteUrl + '/admin/advertising/single',
                controller: 'advertisingSingleCtrl'
            })
            .otherwise({redirectTo: '/'});
});