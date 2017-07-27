ngApp.controller('settingFeedbackListCtrl', function ($scope, $apply, $feedbackService)
{
    $scope.generalInfoDom;
    $scope.data = {
        feedback: {
            id: 0,
            list: {},
            info: {},
            filter: {
                freeText: '',
                pageSize: 15,
                page: 1
            },
            total: 0
        },
        getList: function () {
            $feedbackService.action.list($scope.data.feedback.filter).then(function (resp) {
                console.log(resp);
                $apply(function () {
                    if (resp.status == 200) {
                        $scope.data.feedback.list = resp.data.data;
                        $scope.data.feedback.total = resp.data.total;
                    } else {
                        console.log(resp);
                    }

                });
            }, function (err) {
                console.log(err);
            });
        },
        getInfo: function () {
            $feedbackService.action.info($scope.data.feedback.id).then(function (resp) {
                $apply(function () {
                    console.log(resp);
                    $scope.data.feedback.info = resp.data;
                });
            }, function (err) {
                console.log(err);
            });
        }
    };

    $scope.action = {
        delete: function (id) {
            $feedbackService.action.delete(id).then(function (resp) {
                if (resp.data.status) {
                    $scope.data.getList();
                } else {
                    console.log(resp);
                }
            }, function (err) {
                console.log(err);
            });
        },
        update: function () {
            if (!$($scope.generalInfoDom).parsley().validate())
            {
                return false;
            }
            var data = new $feedbackService.data.update($scope.data.feedback.info.name, $scope.data.feedback.info.order, 
                                                        $scope.data.feedback.info.status);
                                                        
            $feedbackService.action.update($scope.data.feedback.id, data).then(function (resp) {
                window.location.href = '#!/';
            }, function (errors) {
                console.log(errors);
            });
        },
        insert: function () {
            if (!$($scope.generalInfoDom).parsley().validate())
            {
                return false;
            }
             var data = new $feedbackService.data.update($scope.data.feedback.info.name, $scope.data.feedback.info.order, 
                                                        $scope.data.feedback.info.status);
                                                        console.log(data);
            $feedbackService.action.insert(data).then(function (resp) {
                window.location.href = '#!/';
            }, function (errors) {
                console.log(errors);
            });
        },
        changePage: function(page) {
            $scope.data.feedback.filter.page = page;
            $scope.data.getList();
        },
        showModal: function(id){
            $scope.data.feedback.id = id;
            if(id != 0){
                $scope.action.getInfo();
            }
            $('#modalSettingFeedback').modal('show');
        }
    };
    $scope.data.getList();
});