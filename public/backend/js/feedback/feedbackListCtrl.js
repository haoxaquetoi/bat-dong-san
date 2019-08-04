ngApp.controller('feedbackListCtrl', function ($scope, $feedbackService, $apply, $count)
{
    $scope.data = {
        allFbPost: [],
        filter: {
            readed: -1,
            freeText: '',
            page: 1,
            fbID: ''
        },
        allFeedBack: []
    };
    $scope.count = $count;
    $scope.actions = {
        getAllPostFd: function ()
        {
            $apply(function () {
                $scope.data.filter;
                $feedbackService.action.ListFdPost($scope.data.filter).then(function (resp) {
                    $apply(function () {
                        $scope.data.allFbPost = resp.data;
                    });
                    console.log($scope.data.allFbPost)
                }, function (error) {
                    console.log(error)
                });
            });

        },
        changePage: function (page)
        {
            $apply(function () {
                $scope.data.filter.page = page;
                $scope.actions.getAllPostFd();
            });
        },
        loadAllFeedBackConfig: function ()
        {
            $feedbackService.action.list([]).then(function (resp) {
                $scope.data.allFeedBack = resp.data;
            }, function (error) {
                console.log(error)
            })
        },
        detailPostFb: function (info)
        {
            $scope.data.singlePostFb = info;
            $('#modalFeedback').modal('show');
        }

    }

    $scope.actions.getAllPostFd();
    $scope.actions.loadAllFeedBackConfig();




});