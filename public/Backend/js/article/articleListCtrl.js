ngApp.controller('articleListCtrl', function ($scope, $apply, $articleService,
        category,
        post_date,
        count,
        arrArticle,
        $httpParamSerializer,
        filter
        )
{
    $scope.count = count;

    $scope.data = {
        arrArticle: arrArticle,
        filter: filter || {},
        post_date: post_date,
        category: category
    };
    $scope.actions = {
        getAll: function ()
        {
            window.location.href = SiteUrl + '/admin/article?' + $httpParamSerializer($scope.data.filter);
        },
        changePage: function (page)
        {
            $scope.data.filter.page = page;
            $scope.actions.getAll();
        },
        delete: function (id)
        {
            if (confirm('Xác nhận xóa đối tượng đã chọn?'))
            {
                $articleService.actions.delete(id).then(function (resp) {
                    $scope.actions.getAll();
                }, function (error)
                {
                    console.log(error);
                });
            }
        },
        undelete: function (id)
        {
            if (confirm('Xác nhận khôi phục đối tượng đã chọn?'))
            {
                $articleService.actions.undelete(id).then(function (resp) {
                    $scope.actions.getAll();
                }, function (error)
                {
                    console.log(error);
                });
            }
        },
        updateSticky: function (id)
        {
            $articleService.actions.updateSticky(id).then(function (resp) {
                $scope.actions.getAll();
            }, function (error)
            {
                console.log(error);
            });
        },
        updateCensored: function (id)
        {
            $articleService.actions.updateCensored(id).then(function (resp) {
                $scope.actions.getAll();
            }, function (error)
            {
                console.log(error);
            });
        },
        sorting: function (sorting)
        {
            if (sorting != 'ord_sk')
                delete $scope.data.filter['ord_sk'];

            if (sorting != 'ord_cd')
                delete $scope.data.filter['ord_cd'];

            if (sorting != 'ord_fb')
                delete $scope.data.filter['ord_fb'];

            if (sorting != 'ord_crat')
                delete $scope.data.filter['ord_crat'];

            $scope.data.filter[sorting] = $scope.data.filter[sorting] == 'asc' ? 'desc' : 'asc';
            $scope.actions.getAll();
        }
    };
});