ngApp.controller('articleListCtrl', function ($scope, $apply, $articleService, $categoryService)
{
    $scope.data = {
        data: {},
        filter: {
            page: 1,
            type: "",
            freeText: "",
            created_at: "",
            status: "",
            orderBy: '',
            deleted: "",
            pageSize: "",
            category_id: ''

        },
        category: {}
    };
    $scope.actions = {
        getAllCategory: function ()
        {
            $categoryService.actions.getAllCategory().then(function (resp) {
                $scope.data.category = resp.data;
                console.log($scope.data.category);
            }, function (error) {

            });
        },
        getAll: function ()
        {
            $articleService.actions.getAll($scope.data.filter).then(function (resp) {
                console.log(resp);
                $apply(function () {
                    $scope.data.data = resp.data;
                });
            }, function (error) {
                console.log(error);
            });
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
    $scope.actions.getAllCategory();
    $scope.actions.getAll();
});