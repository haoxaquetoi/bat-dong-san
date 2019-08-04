ngApp.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
            .when('/', {
                templateUrl: SiteUrl + '/admin/setting/info',
                controller: 'settingInfoCtrl'
            })
            .when('/email', {
                templateUrl: SiteUrl + '/admin/setting/email',
                controller: 'settingEmailCtrl'
            })
            .otherwise({redirectTo: '/'});
});