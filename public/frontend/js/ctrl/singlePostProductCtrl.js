ngApp.controller('singlePostProductCtrl', function ($scope, $apply, $articleService, $artID, $token)
{
    $scope.listArticleCare = {};
    $scope.data = {
        checkArticleCare: function () {
            $articleService.action.checkArticleCare($artID).then(function (resp) {
                $apply(function () {
                    if (resp.data.status == 'uncare') {
                        $('.care').text('Quan tâm');
                        $('.care').addClass('btn-success');
                        $('.care').removeClass('btn-default');
                    } else {
                        $('.care').text('Bỏ quan tâm');
                        $('.care').addClass('btn-default');
                        $('.care').removeClass('btn-success');
                    }
                });
            }).catch(function (err) {
                console.log(err);
            });
        },
        getAllArticleCare: function () {
            $articleService.action.getAllArticleCare($artID).then(function (resp) {
                $apply(function () {
                    $scope.listArticleCare = resp.data;console.log(resp.data);
                });
            }).catch(function (err) {
                console.log(err);
            });
        }
    };
    $scope.action = {
        updateListCare: function () {
            $articleService.action.updateListCare($artID).then(function (resp) {
                $apply(function () {
                    if (resp.data.status == 'uncare') {
                        $('.care').text('Quan tâm');
                        $('.care').addClass('btn-success');
                        $('.care').removeClass('btn-default');
                    } else {
                        $('.care').text('Bỏ quan tâm');
                        $('.care').addClass('btn-default');
                        $('.care').removeClass('btn-success');
                    }
                });
            }).catch(function (err) {
                console.log(err);
            });
        }
    };
    $scope.data.checkArticleCare();
    $scope.data.getAllArticleCare();
});