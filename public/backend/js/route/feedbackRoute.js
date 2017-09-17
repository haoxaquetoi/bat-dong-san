ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/admin/feedback/list',
                controller: 'feedbackListCtrl'
            })
            .otherwise({redirectTo: '/'});
});