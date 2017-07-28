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
                    if (resp.data && resp.data.status == '1') {
                        $scope.data.feedback.info.status = true;
                    } else {
                        $scope.data.feedback.info.status = false;
                    }
                });
            }, function (err) {
                console.log(err);
            });
        }
    };

    $scope.action = {
        delete: function (id) {
            $feedbackService.action.delete(id).then(function (resp) {
                if (resp.data && resp.data.status) {
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
                if (resp.data && resp.data.status) {
                    $scope.data.getList();
                    $('#modalSettingFeedback').modal('hide');
                } else {
                    console.log(resp);
                }
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
            $feedbackService.action.insert(data).then(function (resp) {
                $scope.data.getList();
                $('#modalSettingFeedback').modal('hide');
            }, function (errors) {
                console.log(errors);
            });
        },
        changePage: function (page) {
            $scope.data.feedback.filter.page = page;
            $scope.data.getList();
        },
        showModal: function (id) {
            $scope.data.feedback.id = id;
            if (id != 0) {
                $scope.data.getInfo();
            } else {
                $scope.data.feedback.info.name = '';
                $scope.data.feedback.info.order = '';
                $scope.data.feedback.info.status = false;
            }
            $('#modalSettingFeedback').modal('show');
        }
    };
    $scope.data.getList();
});