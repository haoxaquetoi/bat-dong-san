ngApp.directive('myCkeditor', function ($apply) {
    return {
        restrict: 'C',
        link: function (scope, element, attrs) {
            $apply(function () {
                $(element).ckeditor({
                    height: 100,
                    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
                    filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: route_prefix + '?type=Files',
                    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
                });
            });
        }
    };
});