ngApp.controller('categoryCtrl', function ($scope, $apply, $categoryService, Slug)
{
    $scope.data = {
        categorys: {},
        categoryInfo: {}
    }
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
        singleModalCategory: function (targetModal, catInfo) {
            $scope.errors = {};
            catInfo = catInfo || {parent_id: '0'};
            catInfo.parent_id = catInfo.parent_id == 0 ? catInfo.parent_id.toString() : catInfo.parent_id;
            $scope.data.categoryInfo = angular.copy(catInfo);
            $(targetModal).modal('show');
        },
        updateCategory: function (targetModal, categoryInfo)
        {
            $scope.errors = {};
            var categoryInfo = categoryInfo ? categoryInfo : {id: 0};
            $scope.categoryInfo = angular.copy(categoryInfo);
            var resp = {};
            if (!categoryInfo.id)
            {
                var resp = $categoryService.actions.insertCategory(categoryInfo);
            } else
            {
                resp = $categoryService.actions.updateCategory(categoryInfo);
            }
            resp.then(function (success) {
                //Reload list categorys
                $scope.actions.getAllCategory();
                $(targetModal).modal('hide');
                $.notify("Cập nhật thông tin thành công!", "success");
            }, function (error) {
                $apply(function () {
                    $scope.errors = error.data;
                })
            });
        },
        getAllCategory: function () {
            $categoryService.actions.getAllCategory().then(function (resp) {
                $apply(function () {
                    $scope.data.categorys = resp.data;
                });

            }, function (error) {
                $.notify("Có lỗi xảy ra khi lấy đanh sách chuyên mục!", "error");
            });
        },
        deleteCategory: function (catId) {
            if (confirm('Xác nhận xóa đối tượng đã chọn?'))
            {
                $categoryService.actions.deleteCategory(catId).then(function (resp) {
                    $scope.actions.getAllCategory();
                    $.notify("Xóa đối tượng đã chọn thành công!", "success");
                }, function (error) {
                    $.notify(error.data, "error");
                });
            }
        }
    }
    $scope.$watchCollection('data.categoryInfo.name', function (oldVal, newVal) {
        $scope.data.categoryInfo.slug = Slug.slugify($scope.data.categoryInfo.name);
    })
    $scope.actions.getAllCategory();
});
