ngApp.controller('articleSingleNewsCtrl', function ($scope
        , Slug
        , $apply
        , $articleService,
        city,
        district,
        village,
        street,
        tags,
        category,
        articleInfo)
{
    $apply(function () {
        $scope.allCity = city;
        $scope.allDistrict = district;
        $scope.allVillage = village;
        $scope.allStreet = street;
        $scope.allTagsOlds = tags;
        $scope.categorys = category;

        $scope.articleInfo = {
            id: articleInfo.id || 0,
            type: 'News',
            title: articleInfo.title || '',
            slug: articleInfo.slug || '',
            content: articleInfo.content || '',
            summary: articleInfo.summary || '',
            thumbnail: articleInfo.thumbnail || '',
            is_sticky: articleInfo.is_sticky || 0,
            is_sold: articleInfo.is_sold || 0,
            tags: articleInfo.tags || [],
            is_censored: articleInfo.is_censored || 0,
            status: articleInfo.status || 'Trash',
            begin_date: articleInfo.begin_date || '', //Y-m-d H:i:s
            end_date: articleInfo.end_date || '', //Y-m-d H:i:s
            category: articleInfo.category || []
        };
        angular.forEach($scope.categorys, function (v, i) {
            if(!articleInfo.category) 
            {
                articleInfo.category = [];
            }
            if (articleInfo.category.indexOf(v.id) < 0)
            {
                v.checked = false;
            } else
            {
                v.checked = true;
            }
        });
        $('#txtSummary').val($scope.articleInfo.summary);
        $('#txtContent').val($scope.articleInfo.content);
        $('#txtbegin_date').val($scope.articleInfo.begin_date);
        $('#txtend_date').val($scope.articleInfo.end_date);

    });


    $scope.generalInfoDom;



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
            window.location.href = SiteUrl + '/admin/article/singleProduct';
        },
        update: function ()
        {
            $scope.articleInfo.category = [];
            angular.forEach($scope.categorys, function (v, i) {
                if (v.checked)
                {
                    $scope.articleInfo.category.push(v.id);
                }
            });
            $scope.articleInfo.begin_date = $('#txtbegin_date').val() || '';
            $scope.articleInfo.end_date = $('#txtend_date').val() || '';

            $scope.articleInfo.thumbnail = $('#thumbnail').val() || '';
            $scope.articleInfo.content = tinyMCE.get('txtContent').getContent();
            $scope.articleInfo.summary = tinyMCE.get('txtSummary').getContent();

            $scope.errors = [];
            if ($scope.articleInfo.id && $scope.articleInfo.id > 0)
            {
                $articleService.actions.edit($scope.articleInfo).then(function (resp) {
                    window.location.href = SiteUrl + '/admin/article'
                }, function (error) {
                    $scope.errors = error.data;
                    $.notify("Có lỗi xảy ra, Bạn vui lòng tải lại trang và thao tác lại!", "error");
                });
            } else
            {
                $articleService.actions.insert($scope.articleInfo).then(function (resp) {
                    window.location.href = SiteUrl + '/admin/article'
                }, function (error) {
                    $scope.errors = error.data;
                    $.notify("Có lỗi xảy ra, Bạn vui lòng tải lại trang và thao tác lại!", "error");
                });
            }
        },
        cancel: function ()
        {
            window.location.href = SiteUrl + '/admin/article'
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
        },
        build_thumnail: function (path)
        {
            if (path != '')
                return SiteUrl + path;
            return '';
        }

    };

    $scope.$watchCollection('articleInfo.title', function (oldVal, newVal) {
        if (oldVal != newVal)
            $scope.articleInfo.slug = Slug.slugify($scope.articleInfo.title);
    });
});