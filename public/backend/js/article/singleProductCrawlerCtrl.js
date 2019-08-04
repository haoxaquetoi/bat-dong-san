ngApp.controller('singleProductCrawlerCtrl', function ($scope
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
        direction,
        $http,
        )
{
    console.log(articleInfo);
    $scope.linkYoutube = '';
    $apply(function () {
        $scope.allCity = city;
        $scope.allDistrict = district;
        $scope.allVillage = village;
        $scope.allStreet = street;
        $scope.allTagsOlds = tags;
        $scope.categorys = category;
        $scope.direction = direction;
        $scope.parent_url = articleInfo.parent_url;
        articleInfo.article_base = articleInfo.article_base || {};
        articleInfo.article_contact = articleInfo.article_contact || {};
        articleInfo.article_other = articleInfo.article_other || {};
        if (!articleInfo.article_slide)
        {
            articleInfo.article_slide = {};
        }

        if (articleInfo.article_slide && articleInfo.article_slide.images)
        {
            articleInfo.article_slide.images[articleInfo.article_slide.images.length] = {
                path: '',
                id: '',
                type: ''
            };

        } else
        {
            articleInfo.article_slide.images = [{
                    path: '',
                    id: '',
                    type: ''
                }];
        }
        if (articleInfo.article_slide && articleInfo.article_slide.video)
        {
            articleInfo.article_slide.video[articleInfo.article_slide.video.length] = {
                path: '',
                id: '',
                type: ''
            };
        } else
        {
            articleInfo.article_slide.video = [{
                    path: '',
                    id: '',
                    type: ''
                }];
        }

        $scope.articleInfo = {
            id: articleInfo.id || 0,
            type: 'Product',
            title: articleInfo.title || '',
            slug: articleInfo.slug || '',
            content: articleInfo.content || '',
            summary: articleInfo.summary || '',
            thumbnail: articleInfo.thumbnail || '',
            is_sticky: articleInfo.is_sticky || 0,
            crawlerPublish: articleInfo.crawlerPublish || 0,
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
                furniture: articleInfo.article_other.furniture || '',
                floor_area: articleInfo.article_other.floor_area || ''
            },
            article_slide: {
                images: articleInfo.article_slide.images,
                video: articleInfo.article_slide.video
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
        $('#txtContentFurniture').val($scope.articleInfo.article_other.furniture);
        $('#txtbegin_date').val($scope.articleInfo.begin_date);
        $('#txtend_date').val($scope.articleInfo.end_date);
        $('#txtContentFurniture').val($scope.articleInfo.article_other.furniture);
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
            $scope.articleInfo.article_other.furniture = tinyMCE.get('txtContentFurniture').getContent();

            $scope.errors = [];
            if ($scope.articleInfo.id && $scope.articleInfo.id > 0)
            {
                $articleService.actions.editCrawler($scope.articleInfo).then(function (resp) {
                    window.location.href = SiteUrl + '/admin/articleCrawler'
                }, function (error) {
                    $scope.errors = error.data;
                    $.notify("Có lỗi xảy ra, Bạn vui lòng tải lại trang và thao tác lại!", "error");
                });
            } else
            {
                $.notify("Có lỗi xảy ra, Tin bài lựa chọn không hợp lệ hoặc không tồn tại!", "error");
            }
        },
        cancel: function ()
        {
            window.location.href = SiteUrl + '/admin/articleCrawler'
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
        },
        chooseImgSlider: function (anchor) {
            $(document).ready(function () {
                $('#' + anchor).change(function () {
                    var path = $(this).val();
                    var length = $scope.articleInfo.article_slide.images.length;
                    $apply(function () {
                        $scope.articleInfo.article_slide.images[length - 1].path = SiteUrl + '/' + path;
                        $scope.articleInfo.article_slide.images[length - 1].type = 'images';
                        $scope.articleInfo.article_slide.images.push({
                            path: '',
                            id: '',
                            type: ''
                        });
                    });
                });
            })

        },
        chooseVideoSlider: function (anchor) {

            $(document).ready(function () {
                $('#' + anchor).change(function () {
                    var path = $(this).val();
                    var length = $scope.articleInfo.article_slide.video.length;
                    $apply(function () {
                        $scope.articleInfo.article_slide.video[length - 1].path = SiteUrl + '/' + path;
                        $scope.articleInfo.article_slide.video[length - 1].type = 'video';
                        $scope.articleInfo.article_slide.video.push({
                            path: '',
                            id: '',
                            type: ''
                        });
                    });
                });
            })

        },
        chooseVideoYoutubeSlider: function ()
        {
            $('#modalChooseYoutube').modal('show');
        },
        saveLinkYoutube: function ()
        {
            var length = $scope.articleInfo.article_slide.video.length;
            var youtubeID = $('#txtYoutubeID').val();
            $apply(function () {

                $scope.articleInfo.article_slide.video[length - 1] = {
                    id: '',
                    type: 'youtube',
                    path: 'https://www.youtube.com/embed/' + youtubeID
                };
                $scope.articleInfo.article_slide.video.push({
                    path: '',
                    id: '',
                    type: ''
                });
            });
            $('#txtYoutubeID').val('');
            $('#modalChooseYoutube').modal('hide');
        },
        removeSlideImg: function (index)
        {
            $scope.articleInfo.article_slide.images.splice(index, 1);

        },
        removeSlideVideo: function (index)
        {
            $scope.articleInfo.article_slide.video.splice(index, 1);
        },

    };
    $scope.$watchCollection('articleInfo.title', function (oldVal, newVal) {
        if (oldVal != newVal && $scope.articleInfo.slug == '')
            $scope.articleInfo.slug = Slug.slugify($scope.articleInfo.title);
    });
});