ngApp.directive('chosseUserModal', function ($apply, $userService) {
    var templateUrl = SiteUrl + '/backend/modal/chosseUserModal';
    var restrict = 'E';
    var scope = {dom: '=', retFunc: '&', defaultData: '='};
    var link = function (scope) {
        scope.page = 1;
        scope.perPage = 15;
        scope.total = 0;
        scope.list;
        scope.freeText = '';
        scope.listChecked = {};
        scope.retVal = {};
        scope.data = {
            list: function () {
                $userService.action.getUserPaginate(scope.page, scope.freeText).then(function (resp) {
                    $apply(function () {
                        scope.total = resp.data.total;
                        scope.list = resp.data.data;
                    });
                }, function (err) {
                    console.log(err);
                });
            }
        };

        scope.action = {
            search: function () {
                scope.page = 1;
                scope.data.list();
            },
            checkAllUser: function (value) {
                $apply(function () {
                    for (var key in scope.list)
                    {
                        scope.listChecked[scope.list[key].id] = value;
                    }
                    scope.action.updateRetVal();
                });
                
            },
            toggleUser: function(chk, userInfo){
                if(chk)
                {
                    scope.retVal[userInfo.id] = userInfo;
                }
                else
                {
                    delete scope.retVal[userInfo.id];
                }
            },
            updateRetVal: function(){
                var userID;
                for(var key in scope.list)
                {
                    userID = scope.list[key].id;
                    if(scope.listChecked[userID])
                    {
                        scope.retVal[userID] = scope.list[key];
                    }
                    else
                    {
                        delete scope.retVal[userID];
                    }
                }
            },
            update: function(){
                $(scope.dom).modal('hide');
                scope.retFunc({retVal: scope.retVal});
            },
            updateDefaultData: function(){
                
            }
        };
        
        scope.data.list();
        
        scope.$watch('page', function(newVal, oldVal){
           if(newVal != oldVal)
           {
               scope.data.list();
           }
        });
        
        scope.$watchCollection('defaultData', function(newVal, oldVal){
            if(newVal != oldVal)
            {
                scope.retVal = angular.copy(newVal);
                scope.listChecked = {};
                for(var key in newVal)
                {
                    scope.listChecked[key] = true;
                }
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