ngApp.directive('widgetTypeAdv', function ($apply, $widgetService) {
    var templateUrl = SiteUrl + '/admin/widget/type/adv';
    var restrict = 'C';
    var scope = {widgetData: '='};
    var link = function (scope) {
        scope.advModal;
        scope.updateData = {};
        scope.widgetId;
        scope.class;
        
        scope.data = {
            set: function (data) {
                var value = JSON.parse(data.value) || {};
                $apply(function () {
                    scope.widgetId = data.id || '';
                    scope.updateData = value.adv || {};
                    scope.class = value.class || '';
                    scope.data.setMytitle();
                });
            },
            advImgSrc: function()
            {
                return SiteUrl + scope.updateData.file_path;
            },
            checkData: function () {
                var file_path = scope.updateData.file_path || '';
                return (file_path.length > 0) ? true : false;
            },
            setMytitle: function(){
                
                $apply(function(){
                    scope.widgetData.myTitle = scope.updateData.title || '';
                });
            }
        };
        
        scope.action = {
            showModalAdv: function(){
                $(scope.advModal).modal('show');
            },
            deleteAdv: function(){
                $apply(function(){
                    scope.updateData = {};
                });
            },
            successChosseAdv: function(retVal){
                $apply(function(){
                    scope.updateData = retVal;
                })
            },
            update: function(){
                $widgetService.action.updateItem(scope.widgetId, {class: scope.class, adv: scope.updateData})
                    .then(function(resp){
                        $.notify("Cập nhật thành công!", "success");
                        scope.data.setMytitle();
                    })
                    .catch(function(err){
                        console.log(err);
                    });
            },
        };
        
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