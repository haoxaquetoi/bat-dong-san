ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/admin/widget/list',
                controller: 'widgetListCtrl'
            })
            .otherwise({redirectTo: '/'});
});