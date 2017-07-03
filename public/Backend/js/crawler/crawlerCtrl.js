ngApp.controller('crawlerCtrl', function ($scope, $apply, $crawlerService)
{
    $scope.data = {
        crawler: {},
        singleCrawler: {}
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
        getAllCrawler: function ()
        {
            $crawlerService.actions.getAllCrawler().then(function (resp)
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
        singleModalCrawler: function (targetModal, crawlerInfo)
        {
            $(targetModal).modal('show');
            $scope.data.singleCrawler = angular.copy(crawlerInfo);
        },
        addNewCrawler: function ()
        {



        },
        editCrawler: function ()
        {


        },
        deleteCrawler: function ()
        {
            if (!confirm('Xác nhận xóa đối tượng đã chọn?'))
            {
                return false;
            }



        }
    };
    
    $scope.actions.getAllCrawler();
});
