ngApp.controller('articleListCtrl', function ($scope, $apply, $articleService,
        category,
        post_date,
        count,
        arrArticle,
        $httpParamSerializer
        )
{
    $scope.count = count;

    $scope.data = {
        arrArticle: arrArticle,
        filter: {
            page: 1,
            type: "",
            freeText: "",
            created_at: "",
            status: "",
            orderBy: '',
            deleted: "",
            pageSize: "",
            category_id: '',
            post_date: ''

        },
        post_date: post_date,
        category: category
    };
    
    var params = {};
    if (location.search) {
        var parts = location.search.substring(1).split('&');

        for (var i = 0; i < parts.length; i++) {
            var nv = parts[i].split('=');
            if (!nv[0])
                continue;
            params[nv[0]] = nv[1] || '';
        }
    }
    $scope.data.filter = params;
    
    $scope.actions = {
        getAll: function ()
        {

            window.location.href = SiteUrl + '/admin/article?' + $httpParamSerializer(params);
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
            if (sorting == 'sticky')
            {

            }
        }
    };
});