ngApp.controller('crawlerCtrl', function ($scope, $apply, $crawlerService)
{
    $scope.data = {
        crawler: {},
        filter: {
            keywork: ''
        },
        singleWebsite: {}
    };

    $scope.errors = {};

    $scope.actions = {
        hasError: function (code)
        {
            return $scope.errors[code] ? true : false;
        },
        showError: function (code)
        {
            return $scope.errors[code] ? $scope.errors[code][0] : '';
        },
        getAllCrawler: function (filter)
        {
            $crawlerService.actions.getAllCrawler(filter).then(function (resp)
            {
                $apply(function ()
                {
                    $scope.data.crawler = resp.data;
                });

            }, function (error)
            {
                console.log(error);
                $apply(function ()
                {
                    $.notify("Xảy ra lỗi không thể lấy danh sách nguồn lấy tin", "error");
                });
            });
        }
        ,
        singleModalCrawler: function (targetModal, websiteInfo)
        {
            $scope.errors = [];
            $(targetModal).modal('show');
            $scope.data.singleWebsite = angular.copy(websiteInfo);
        },
        addNewCrawler: function (targetModal)
        {
            $scope.errors = [];
            $crawlerService.actions.add($scope.data.singleWebsite).then(function (resp) {
                $scope.actions.getAllCrawler();
                $(targetModal).modal('hide');
            }, function (error) {
                $scope.errors = error.data;
                $.notify("Xảy ra lỗi, bạn vui lòng tại lại trang sau đó thao tác lại", "error");
            });
        },
        editCrawler: function (targetModal)
        {
            $scope.errors = [];
            $crawlerService.actions.edit($scope.data.singleWebsite).then(function (resp) {
                $scope.actions.getAllCrawler();
                $(targetModal).modal('hide');
            }, function (error) {
                $scope.errors = error.data;
                $.notify("Xảy ra lỗi, bạn vui lòng tại lại trang sau đó thao tác lại", "error");
            });
        },
        trashWebsite: function (id)
        {
            if (!confirm('Xác nhận xóa đối tượng đã chọn?'))
            {
                return false;
            }
            $crawlerService.actions.delete(id).then(function (resp) {
                $scope.actions.getAllCrawler();
            }, function (error) {
                $scope.errors = error.data;
                $.notify("Xảy ra lỗi, bạn vui lòng tại lại trang sau đó thao tác lại", "error");
            });
        },
        publishWebsite: function (websiteInfo)
        {
            if (!confirm('Xác nhận khôi phục đối tượng đã chọn?'))
            {
                return false;
            }
            $crawlerService.actions.publish(websiteInfo).then(function (resp) {
                $scope.actions.getAllCrawler();
            }, function (error) {
                $scope.errors = error.data;
                $.notify("Xảy ra lỗi, bạn vui lòng tại lại trang sau đó thao tác lại", "error");
            });
        }
    };

    $scope.actions.getAllCrawler();
});
