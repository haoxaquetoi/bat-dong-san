ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/admin/article/list',
                controller: 'articleListCtrl'
            })
            .when('/singleNews/:id', {
                templateUrl: SiteUrl + '/admin/article/singleNews',
                controller: 'articleSingleNewsCtrl'
            })
            .when('/singleProduct/:id', {
                templateUrl: SiteUrl + '/admin/article/singleProduct',
                controller: 'articleSingleProductCtrl'
            })
            .otherwise({redirectTo: '/'});
});