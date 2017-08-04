ngApp.controller('articleSingleProductCtrl', function ($scope
        , Slug
        , $apply
        , $articleService,
        city,
        district,
        village,
        street,
        tags,
        category,
        articleInfo,
        direction
        )
{
    $apply(function () {
        $scope.allCity = city;
        $scope.allDistrict = district;
        $scope.allVillage = village;
        $scope.allStreet = street;
        $scope.allTagsOlds = tags;
        $scope.categorys = category;
        $scope.direction = direction;

        articleInfo.article_base = articleInfo.article_base || {};
        articleInfo.article_contact = articleInfo.article_contact || {};
        articleInfo.article_other = articleInfo.article_other || {};

        $scope.articleInfo = {
            id: articleInfo.id || 0,
            type: 'Product',
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
            category: articleInfo.category || [],
            article_base: {
                city_id: articleInfo.article_base.city_id || '',
                district_id: articleInfo.article_base.district_id || '',
                village_id: articleInfo.article_base.village_id || '',
                street_id: articleInfo.article_base.street_id || '',
                address: articleInfo.article_base.address || '',
                price: articleInfo.article_base.price || '',
                myself: articleInfo.article_base.myself || 1
            },
            article_contact: {
                name: articleInfo.article_contact.name || '',
                address: articleInfo.article_contact.address || '',
                phone: articleInfo.article_contact.phone || '',
                mobile: articleInfo.article_contact.mobile || '',
                email: articleInfo.article_contact.email || ''
            },
            article_other: {
                facade: articleInfo.article_other.facade || '',
                entry_width: articleInfo.article_other.entry_width || '',
                house_direction: articleInfo.article_other.house_direction || '',
                balcony_direction: articleInfo.article_other.balcony_direction || '',
                number_of_storeys: articleInfo.article_other.number_of_storeys || '',
                number_of_wc: articleInfo.article_other.number_of_wc || '',
                number_of_bedrooms: articleInfo.article_other.number_of_bedrooms || '',
                furniture: articleInfo.article_other.furniture || ''
            }
        };
        angular.forEach($scope.categorys, function (v, i) {
            articleInfo.category = articleInfo.category || [];
            if (articleInfo.category.indexOf(v.id) < 0)
            {
                v.checked = false;
            } else
            {
                v.checked = true;
            }
        });
        $('#txtContent').val($scope.articleInfo.content);
        $('#txtbegin_date').val($scope.articleInfo.begin_date);
        $('#txtend_date').val($scope.articleInfo.end_date);
        $('#txtContentFurniture').val($scope.articleInfo.article_other.txtContentFurniture);



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
            window.location.href = SiteUrl + '/admin/article/singleNews';
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
            $scope.articleInfo.content = CKEDITOR.instances.txtContent.getData();
            $scope.articleInfo.article_other.txtContentFurniture = CKEDITOR.instances.txtContentFurniture.getData();
            
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
        },
        renderAddress: function ()
        {
            $apply(function () {
                if ($scope.articleInfo.article_base.city_id)
                {
                    $.each($scope.allCity, function (i, v) {
                        if (v.id == $scope.articleInfo.article_base.city_id)
                        {
                            $scope.articleInfo.article_base.address = v.name;
                        }
                    });

                }


                if ($scope.articleInfo.article_base.district_id)
                {
                    $.each($scope.allDistrict, function (i, v) {
                        if (v.id == $scope.articleInfo.article_base.district_id)
                        {
                            $scope.articleInfo.article_base.address += ' - ' + v.name;
                        }
                    });
                }


                if ($scope.articleInfo.article_base.village_id)
                {
                    $.each($scope.allVillage, function (i, v) {
                        if (v.id == $scope.articleInfo.article_base.village_id)
                        {
                            $scope.articleInfo.article_base.address += ' - ' + v.name;
                        }
                    });

                }


                if ($scope.articleInfo.article_base.street_id)
                {
                    $.each($scope.allStreet, function (i, v) {
                        if (v.id == $scope.articleInfo.article_base.street_id)
                        {
                            $scope.articleInfo.article_base.address += ' - ' + v.name;
                        }
                    });

                }
            });
        }

    };

    $scope.$watchCollection('articleInfo.title', function (oldVal, newVal) {
        if (oldVal != newVal)
            $scope.articleInfo.slug = Slug.slugify($scope.articleInfo.title);
    });
});