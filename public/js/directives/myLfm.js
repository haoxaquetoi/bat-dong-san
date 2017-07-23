ngApp.directive('myLfm', function ($apply) {
    return {
        restrict: 'C',
        link: function (scope, element, attrs) {
            $apply(function(){
                $(element).filemanager('image', {prefix: route_prefix});
            });
        }
    };
});