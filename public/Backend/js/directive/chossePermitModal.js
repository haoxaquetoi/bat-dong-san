ngApp.directive('chossePermitModal', function ($apply, $permitService) {
    var templateUrl = SiteUrl + '/backend/modal/chossePermitModal';
    var restrict = 'E';
    var scope = {dom: '=', retFunc: '&', defaultData: '='};
    var link = function (scope) {
        scope.list;
        scope.chklList = {};
        scope.data = {
            getList: function(){
                $permitService.actions.listPermit().then(function(resp){
                    $apply(function(){
                        scope.list = resp.data;
                    });
                }, function(err){
                    console.log(err);
                });
            },
            getRetVal: function(){
                var retVal = {};
                for(var index in scope.list)
                {
                    for(var code in scope.list[index]['permit'])
                    {
                        if(scope.chklList[code])
                        {
                            retVal[code] = scope.list[index]['permit'][code];
                        }
                    }
                }
                
                return retVal;
            }
        };
        
        scope.action = {
            update: function(){
                $(scope.dom).modal('hide');
                scope.retFunc({retVal: scope.data.getRetVal()});
            }
        };
        
        scope.data.getList();
        scope.$watchCollection('defaultData', function(newVal, oldVal){
            if(newVal != oldVal)
            {
                var tmp = {};
                for(var code in newVal)
                {
                    tmp[code] = true;
                }
                
                $apply(function(){
                    scope.chklList = tmp;
                });
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