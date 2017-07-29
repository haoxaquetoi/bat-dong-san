ngApp.controller('articleSingleNewsCtrl', function ($scope, $location, Slug, $apply, $articleService, $categoryService, $tagsService)
{
    $scope.generalInfoDom;
    $scope.categorys = [];
    $scope.allTagsOlds = [];
    $scope.articleInfo = {
        type: 'News',
        title: '',
        slug: '',
        content: '',
        summary: '',
        thumbnail: '',
        tags: [],
        is_sticky: 0,
        is_censored: 0,
        status: 'Publish',
        begin_date: '', //Y-m-d H:i:s
        end_date: '', //Y-m-d H:i:s
        category: []
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
        changePage: function () {
            $location.path('/singleProduct/0');
        },
        update: function ()
        {
            $scope.articleInfo.category = [];
            $.each($('.chkCat'), function (i, v) {
                if ($(v)[0].checked)
                {
                    $scope.articleInfo.category.push($(v)[0].value);
                }
            });
            
            $scope.articleInfo.txtbegin_date = $('#txtbegin_date').val() || '';
            $scope.articleInfo.txtend_date = $('#txtend_date').val() || '';
            $scope.articleInfo.thumbnail = $('#thumbnail').val() || '';
            $scope.articleInfo.summary = CKEDITOR.instances.txtSummary.getData();
            $scope.articleInfo.content = CKEDITOR.instances.txtContent.getData();
            $scope.articleInfo.is_sticky = $('#chkSticky')[0].checked ? 1 : 0;
            $scope.articleInfo.is_censored = $('#chkCensored')[0].checked ? 1 : 0;

            $scope.errors = [];
            $articleService.actions.insert($scope.articleInfo).then(function (resp) {
                $location.path('/');
            }, function (error) {
                $scope.errors = error.data;
                $.notify("Có lỗi xảy ra, Bạn vui lòng tải lại trang và thao tác lại!", "error");
            });
        },
        getAllCategory: function () {
            $categoryService.actions.getAllCategory().then(function (resp) {
                $apply(function () {
                    $scope.categorys = resp.data;
                });

            }, function (error) {
                $.notify("Có lỗi xảy ra khi lấy đanh sách chuyên mục!", "error");
            });
        },
        addTags: function ()
        {
            var newTags = $('#txtTag').val() || '';
            if (newTags == '')
            {
                return;
            }
            var arrNewtags = newTags.split(',');
            $.each(arrNewtags, function (iParent, vParent) {
                if ($.trim(vParent) != '')
                {
                    var push = true;
                    $.each($scope.articleInfo.tags, function (i, v) {
                        if (vParent == v)
                        {
                            push = false;
                        }
                    });
                    if (push)
                    {
                        $scope.articleInfo.tags.push(vParent);
                    }

                }
            });
            $('#txtTag').val('');
        },
        removeTags: function (tagsID)
        {
            $scope.articleInfo.tags.splice(tagsID, 1);
        },
        loadAllTags: function ()
        {
            $tagsService.actions.getAll().then(function (resp) {
                $scope.allTagsOlds = resp.data || [];
            }, function (error) {
                console.log(error);
            });
        },
        chooseTagsOld: function (tag)
        {
            var push = true;
            $.each($scope.articleInfo.tags, function (i, v) {
                if (tag == v)
                {
                    push = false;
                }
            });
            if (push)
            {
                var newtag = angular.copy(tag);
                $('#txtTag').val(newtag);
                $scope.actions.addTags();
            }
        }
    };
    $scope.$watchCollection('articleInfo.title', function (oldVal, newVal) {
        $scope.articleInfo.slug = Slug.slugify($scope.articleInfo.title);
    });


    $scope.actions.getAllCategory();
    $scope.actions.loadAllTags();

});