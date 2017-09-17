ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/admin/group/list',
                controller: 'groupListCtrl'
            })
            .when('/single/:id', {
                templateUrl: SiteUrl + '/admin/group/single',
                controller: 'groupSingleCtrl'
            })
            .otherwise({redirectTo: '/'});
});