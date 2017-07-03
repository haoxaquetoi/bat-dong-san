ngApp.controller('groupSingleCtrl', function ($scope, $apply, $location, $routeParams, $groupService, $groupUserService, $permitService, $myFunc)
{
    //dom lay tu directive chosseUserModal
    $scope.chosseUserModal;
    $scope.chossePermitModal;
    $scope.generalInfoDom;
    
    $scope.chosseUser = {};
    $scope.chossePermit = {};
    $scope.data = {
        group: {
            id: $routeParams.id,
            info: {}
        },
        users: {},
        permit: {},
        getTitle: function () {
            var title = (parseInt($scope.data.group.id) > 0) ? 'Chỉnh sửa nhóm' : 'Thêm mới nhóm';
            return title;
        },
        getInfo: function () {
            $groupService.actions.info($scope.data.group.id).then(function (resp) {
                $apply(function () {
                    $scope.data.group.info = resp.data;
                });
            }, function (err) {
                console.log(err);
            });
        },
        getUsers: function () {
            $groupUserService.actions.getUser($scope.data.group.id).then(function (resp) {
                $apply(function () {
                    if($myFunc.hasData(resp.data))
                    {
                        $scope.data.users = resp.data;
                    }
                });
            }, function(err){
                console.log(err)
            });
        },
        
        getPermit: function(){
            $permitService.actions.listPermitOfGroup($scope.data.group.id).then(function (resp) {
                $apply(function () {
                    if($myFunc.hasData(resp.data))
                    {
                        $scope.data.permit = resp.data;
                    }
                });
            }, function(err){
                console.log(err)
            });
        }
    };

    $scope.action = {
        update: function () {
            if(!$($scope.generalInfoDom).parsley().validate())
            {
                return false;
            }
            var data = new $groupService.data.update($scope.data.group.id, $scope.data.group.info.name, 
                                                        $scope.data.group.info.code, Object.keys($scope.data.users), 
                                                        Object.keys($scope.data.permit));
                                                        
            $groupService.actions.update(data).then(function (resp) {
                window.location.href = '#!/';
            }, function (errors) {
                console.log(errors);
            });
        },
        showChosseUserModal: function () {
            $($scope.chosseUserModal).modal('show');
        },
        chosseUser: function (retVal) {
            $apply(function () {
                $scope.data.users = retVal;
            });
        },
        userCheckAll: function (chk) {
            for (var userID in $scope.data.users)
            {
                $scope.chosseUser[userID] = chk;
            }
        },
        deleteChosseUser: function () {
            var tmpArr = $scope.data.users;
            for (var userId in $scope.chosseUser)
            {
                delete tmpArr[userId];
            }

            $apply(function () {
                $scope.data.users = tmpArr;
            });
        },
        showChossePermitModal: function(){
            $($scope.chossePermitModal).modal('show');
        },
        chossePermit: function(retVal){
            $apply(function () {
                $scope.data.permit = retVal;
            });
        },
        deleteChossePermit: function(){
            var tmp = $scope.data.permit;
            for(var code in $scope.data.permit)
            {
                if($scope.chossePermit[code])
                {
                    delete tmp[code];
                }
            }
            
            $apply(function(){
                $scope.data.permit = tmp;
            })
        },
        checkAllPermit: function(chk)
        {
            for(var code in $scope.data.permit)
            {
                $scope.chossePermit[code] = chk;
            }
        }
    }

    $scope.$watch('data.group.id', function (newVal, oldVal) {
        if (parseInt(newVal) > 0)
        {
            $scope.data.getInfo();
            $scope.data.getUsers();
            $scope.data.getPermit();
        }
    });
});