ngApp.directive('myLfmImg', function ($apply) {
    return {
        restrict: 'C',
        link: function (scope, element, attrs) {
            $apply(function () {
                $(element).filemanager('Images', {prefix: route_prefix});
        
            });
        }
    };
});


ngApp.directive('myLfmFile', function ($apply) {
    return {
        restrict: 'C',
        link: function (scope, element, attrs) {
            $apply(function () {
                $(element).filemanager('Files', {prefix: route_prefix});
            });
        }
    };
});