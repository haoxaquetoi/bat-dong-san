ngApp.directive('chosseGroupModal', function ($apply, $groupService) {
    var templateUrl = SiteUrl + '/admin/modal/chosseGroupModal';
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
                $groupService.actions.list(scope.page, scope.freeText).then(function (resp) {
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
            checkAllGroup: function (value) {
                $apply(function () {
                    for (var key in scope.list)
                    {
                        scope.listChecked[scope.list[key].id] = value;
                    }
                    scope.action.updateRetVal();
                });
                
            },
            toggleGroup: function(chk, groupInfo){
                if(chk)
                {
                    scope.retVal[groupInfo.id] = groupInfo;
                }
                else
                {
                    delete scope.retVal[groupInfo.id];
                }
            },
            updateRetVal: function(){
                var groupID;
                for(var key in scope.list)
                {
                    groupID = scope.list[key].id;
                    if(scope.listChecked[groupID])
                    {
                        scope.retVal[groupID] = scope.list[key];
                    }
                    else
                    {
                        delete scope.retVal[groupID];
                    }
                }
            },
            update: function(){
                $(scope.dom).modal('hide');
                scope.retFunc({retVal: scope.retVal});
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