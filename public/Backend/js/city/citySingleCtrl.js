ngApp.controller('citySingleCtrl', function ($scope, $apply, $routeParams, $cityService)
{
    $scope.generalInfoDom;
    $scope.data = {
        city: {
            id: $routeParams.id,
            info: {}
        },
        getInfo: function () {
            $cityService.actions.info($scope.data.city.id).then(function (resp) {
                $apply(function () {
                    console.log(resp);
                    $scope.data.city.info = resp.data;
                });
            }, function (err) {
                console.log(err);
            });
        }
    };

    $scope.action = {
        update: function () {
            if(!$($scope.generalInfoDom).parsley().validate())
            {
                return false;
            }
            var dataPost = {
                id: $scope.data.city.id,
                name: $scope.data.city.info.name,
                code: $scope.data.city.info.code
            };
            $cityService.actions.update(dataPost).then(function (resp) {
                window.location.href = '#!/';
            }, function (errors) {
                console.log(errors);
            });
        },
        insert: function () {
            if(!$($scope.generalInfoDom).parsley().validate())
            {
                return false;
            }
            var dataPost = {
                name: $scope.data.city.info.name,
                code: $scope.data.city.info.code
            };
            $cityService.actions.insert(dataPost).then(function (resp) {
                window.location.href = '#!/';
            }, function (errors) {
                console.log(errors);
            });
        }
    };

    $scope.$watch('data.city.id', function (newVal, oldVal) {
        if (parseInt(newVal) > 0)
        {
            $scope.data.getInfo();
        }
    });
});