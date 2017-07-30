ngApp.controller('advertisingSingleCtrl', function ($scope, $apply, $routeParams, $advService)
{
    $scope.generalInfoDom;
    $scope.data = {
        adv: {
            id: $routeParams.id,
            info: {}
        },
        getInfo: function () {
            $advService.action.info($scope.data.adv.id).then(function (resp) {
                $apply(function () {
                    console.log(resp);
                    $scope.data.adv.info = resp.data;
                    $scope.data.adv.info.begin_date = new Date(resp.data.begin_date);
                    $scope.data.adv.info.end_date = new Date(resp.data.end_date);
                    if(resp.data.status == '1'){
                        $scope.data.adv.info.status = true;
                    }else{
                        $scope.data.adv.info.status = false;
                    }
                });
            }, function (err) {
                console.log(err);
            });
        }
    };

    $scope.action = {
        update: function () {
            if (!$($scope.generalInfoDom).parsley().validate())
            {
                return false;
            }
            var dataPost = {
                id: $scope.data.adv.id,
                name: $scope.data.adv.info.name,
                url: $scope.data.adv.info.url,
                begin_date: $scope.action.getFormattedDateYMD($scope.data.adv.info.begin_date),
                end_date: $scope.action.getFormattedDateYMD($scope.data.adv.info.end_date),
                status: $scope.data.adv.info.status || false,
                file_path: $('#thumbnail').val()
            };
            $advService.action.update($scope.data.adv.id, dataPost).then(function (resp) {
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
            var dataPost = {
                name: $scope.data.adv.info.name,
                url: $scope.data.adv.info.url,
                begin_date: $scope.action.getFormattedDateYMD($scope.data.adv.info.begin_date),
                end_date: $scope.action.getFormattedDateYMD($scope.data.adv.info.end_date),
                status: $scope.data.adv.info.status || false,
                file_path: $('#thumbnail').val()
            };
            $advService.action.insert(dataPost).then(function (resp) {
                window.location.href = '#!/';
            }, function (errors) {
                console.log(errors);
            });
        },
        getFormattedDateYMD: function (date)
        {
            if (date)
            {
                var month = (1 + date.getMonth()) > 9 ? (1 + date.getMonth()) : '0' + (1 + date.getMonth());
                var day = date.getDate() > 9 ? date.getDate() : '0' + date.getDate();
                return date.getFullYear() + '-' + month + '-' + day;
            }

            return date;
        }
    };

    $scope.$watch('data.adv.id', function (newVal, oldVal) {
        if (parseInt(newVal) > 0)
        {
            $scope.data.getInfo();
        }
    });
});