ngApp.directive('widgetTypeImage', function ($apply, $widgetService) {
    var templateUrl = SiteUrl + '/admin/widget/type/image';
    var restrict = 'C';
    var scope = {widgetData: '='};
    var link = function (scope) {
        scope.widgetId;
        scope.title;
        scope.link;
        scope.image;
        scope.hdnImage;
        scope.imagePreview;

        scope.data = {
            set: function (data) {
                var value = JSON.parse(data.value) || {};
                $apply(function () {
                    scope.widgetId = data.id || '';
                    scope.image = value.image;
                    scope.title = value.title;
                    scope.link = value.link;
                    scope.class = value.class;
                });
            },
            checkImage: function () {
                return (scope.image.length > 0) ? true : false;
            }
        };

        scope.action = {
            update: function () {
                var data = {
                    image: $(scope.hdnImage).val(),
                    title: scope.title,
                    link: scope.link,
                    class: scope.class
                };
                
                $widgetService.action.updateItem(scope.widgetId, data)
                    .then(function(resp){
                        $.notify("Cập nhật thành công!", "success");
                    })
                    .catch(function(err){
                        console.log(err);
                    });
            },
            deleteImage: function () {
                $(scope.hdnImage).val('');
                $(scope.imagePreview).attr('src', '');
            }
        };
        scope.$watch('image', function (newVal, oldVal) {
            $(scope.imagePreview).attr('src', SiteUrl + '/' + newVal);
        });
        scope.$watchCollection('widgetData', function (newVal, oldVal) {
            scope.data.set(newVal);
        });
    };
    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link,
    };
});