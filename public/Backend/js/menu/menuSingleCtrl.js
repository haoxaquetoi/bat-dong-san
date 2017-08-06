ngApp.controller('menuSingleCtrl', function ($scope, $menuService, $apply, $location, $routeParams, $categoryService, $articleService)
{
    $scope.data = {
        menuInfo: {
            type: 'link',
            parent: '0',
            order: 1,
            name: '',
            position_id: $routeParams.postionID,
            value: {
                url: '',
                categoryID: '',
                articleID: ''
            }
        },
        category: {},
        listMenu: {},
        article: {
            arrArticle: {},
            filter: {
                category_id: '',
                freeText: '',
                post_date: ''
            },
            post_date: {},
            articleSelected: {}
        }
    };
    $scope.errors = [];
    $scope.actions = {
        hasError: function (code)
        {
            return $scope.errors[code] ? true : false;
        },
        showError: function (code)
        {
            return $scope.errors[code] ? $scope.errors[code][0] : '';
        },
        goback: function () {
            $location.path('');
        },
        singleMenu: function ()
        {
            $scope.errors = [];
            $menuService.action.infoMenu($routeParams.id).then(function (resp) {

                $apply(function () {
                    $scope.data.menuInfo = resp.data;
                    $scope.data.menuInfo.value = $scope.data.menuInfo.value ? JSON.parse($scope.data.menuInfo.value) : {};
                    $scope.data.menuInfo.parent = $scope.data.menuInfo.parent == 0 ? $scope.data.menuInfo.parent.toString() : $scope.data.menuInfo.parent;
                    if ($scope.data.menuInfo.type == 'article')
                    {
                        $articleService.actions.getSingleArticle($scope.data.menuInfo.value.articleID).then(function (resp) {
                            $scope.data.article.articleSelected = resp.data;
                        }, function (error) {
                            console.log(error);
                            $scope.errors = error.data;
                            $.notify("Xảy ra lỗi, vui lòng tải lại trang sau đó thao tác lại!", "error");
                        });
                    }
                });
            }, function (error) {
                console.log(error);
                $.notify("Xảy ra lỗi, vui lòng tải lại trang sau đó thao tác lại!", "error");
            });
        },
        addNewMenu: function ()
        {
            $scope.errors = [];
            $menuService.action.insertMenu($scope.data.menuInfo).then(function (resp) {
                $location.path('');
            }, function (error) {
                console.log(error);
                $scope.errors = error.data;
                $.notify("Xảy ra lỗi, vui lòng tải lại trang sau đó thao tác lại!", "error");
            });

        },
        updateMenu: function ()
        {
            $scope.errors = [];
            $menuService.action.updateMenu($scope.data.menuInfo.id, $scope.data.menuInfo).then(function (resp) {
                $location.path('');
            }, function (error) {
                $scope.errors = error.data;
                console.log(error);
//                $.notify("Xảy ra lỗi, vui lòng tải lại trang sau đó thao tác lại!", "error");
            });

        },
        //load danh sach menu con
        showListMenu: function () {
            $menuService.action.listMenu($routeParams.postionID).then(function (resp) {
                $apply(function () {
                    $scope.data.listMenu = resp.data;
                });
            }, function (error) {
                console.log(error);
                $.notify("Xảy ra lỗi hiển thị danh sách menu, Bạn vui lòng tải lại trang và thao tác lại!", "error");
            });
        },
        getCategory: function ()
        {
            $categoryService.actions.getAllCategory().then(function (resp) {
                $apply(function () {
                    $scope.data.category = resp.data;
                    console.log($scope.data.category);
                });
            }, function (error) {
                console.log(error);
            });
        },
        getAllPostDate: function ()
        {
            $articleService.actions.getAllPostDate().then(function (resp) {
                $apply(function () {
                    $scope.data.article.post_date = resp.data;
                });
            }, function (error) {
                console.log(error);
            });
        },
        getAllArticle: function ()
        {
            $articleService.actions.getAll($scope.data.article.filter).then(function (resp) {
                $apply(function () {
                    $scope.data.article.arrArticle = resp.data;
                });
            }, function (error) {
                console.log(error);
            });
        },
        chooseArticle: function (articleInfo)
        {
            if (articleInfo.deleted == 1 || articleInfo.expired == 1)
            {
                $.notify("Không được chọn tin bài đã xóa hoặc hết hạn đăng, Bạn vui lòng chọn tin bài khác", "error");
                return false;
            }
            $('#modalArticle').modal('hide');
            $apply(function () {
                $scope.data.menuInfo.value.articleID = articleInfo.id;
                $scope.data.article.articleSelected = articleInfo;
            });
        },
        removeSelectedArticle: function ()
        {
            $apply(function () {
                $scope.data.article.articleSelected = {};
                $scope.data.menuInfo.value.articleID = '';
            });
        }
    };
    $scope.$watchCollection('data.menuInfo.position_id', function () {
        $scope.actions.showListMenu();
    });

    if ($routeParams.id > 0)
    {
        $scope.actions.singleMenu();

    }
    $scope.actions.getCategory();
    $scope.actions.getAllPostDate();
    $scope.actions.getAllArticle();
});