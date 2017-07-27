ngApp.directive('widgetTypeAdv', function ($apply, $userService) {
    var templateUrl = SiteUrl + '/admin/widget/type/adv';
    var restrict = 'C';
    var scope = {dataId: '='};
    var link = function (scope) {
        console.log(adv);
    };
    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link,
    };
});