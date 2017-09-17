ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/admin/settingFeedback/list',
                controller: 'settingFeedbackListCtrl'
            })
            .otherwise({redirectTo: '/'});
});