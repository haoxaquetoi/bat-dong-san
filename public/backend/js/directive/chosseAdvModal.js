ngApp.directive('chosseAdvModal', function ($apply, $advService) {
    var templateUrl = SiteUrl + '/admin/modal/chosseAdvModal';
    var restrict = 'E';
    var scope = {dom: '=', retFunc: '&'};
    var link = function (scope) {
        scope.page = 1;
        scope.perPage = 15;
        scope.total = 0;
        scope.list;
        scope.freeText = '';
        
        
        scope.data = {
            list: function () {
                var reqData = new $advService.data.list(scope.freeText, '', '', scope.page, scope.perPage);
                $advService.action.list(reqData).then(function (resp) {
                    console.log(resp.data);
                    $apply(function () {
                        scope.total = resp.data.total;
                        scope.list = resp.data.data;
                    });
                }, function (err) {
                    console.log(err);
                });
            },
            imgSrc: function(filePath){
                return SiteUrl + filePath;
            }
        };

        scope.action = {
            search: function () {
                scope.page = 1;
                scope.data.list();
            },
            update: function(item){
                $(scope.dom).modal('hide');
                scope.retFunc({retVal: item});
            }
        };
        
        scope.data.list();
        
        scope.$watch('page', function(newVal, oldVal){
           if(newVal != oldVal)
           {
               scope.data.list();
           }
        });
    };
    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link,
    };
});