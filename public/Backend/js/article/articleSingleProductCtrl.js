ngApp.controller('articleSingleProductCtrl', function ($scope, $location, Slug, $apply, $articleService, $categoryService, $tagsService, $routeParams, $addressService)
{
    $scope.generalInfoDom;
    $scope.categorys = [];
    $scope.allTagsOlds = [];
    $scope.allCity = [];
    $scope.allDistrict = [];
    $scope.allVillage = [];
    $scope.allStreet = [];

    $scope.articleInfo = {
        id: 0,
        type: 'Product',
        title: '',
        slug: '',
        content: '',
        summary: '',
        thumbnail: '',
        is_sticky: 0,
        tags: [],
        is_censored: 0,
        status: 'Trash',
        begin_date: '', //Y-m-d H:i:s
        end_date: '', //Y-m-d H:i:s
        category: [],
        articleBase: {
            city_id: '',
            district_id: '',
            village_id: '',
            street_id: '',
            address: '',
            price: '',
            myself: 1
        },
        articleContact: {
            name: '',
            address: '',
            phone: '',
            mobile: '',
            email: ''
        },
        articleOther: {
            facade: '',
            entry_width: '',
            house_direction: '',
            balcony_direction: '',
            number_of_storeys: '',
            number_of_wc: '',
            number_of_bedrooms: '',
            furniture: ''
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
        changePage: function () {
            window.location.href = SiteUrl + '/admin/article/singleNews';
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

            $scope.articleInfo.begin_date = $('#txtbegin_date').val() || '';
            $scope.articleInfo.end_date = $('#txtend_date').val() || '';

            $scope.articleInfo.thumbnail = $('#thumbnail').val() || '';
            $scope.articleInfo.content = CKEDITOR.instances.txtContent.getData();
            $scope.articleInfo.is_sticky = $('#chkSticky')[0].checked ? 1 : 0;
            $scope.articleInfo.is_censored = $('#chkCensored')[0].checked ? 1 : 0;


            $scope.errors = [];
            if ($scope.articleInfo.id && $scope.articleInfo.id > 0)
            {
                $articleService.actions.edit($scope.articleInfo).then(function (resp) {
                    $location.path('/');
                }, function (error) {
                    $scope.errors = error.data;
                    $.notify("Có lỗi xảy ra, Bạn vui lòng tải lại trang và thao tác lại!", "error");
                });
            } else
            {
                $articleService.actions.insert($scope.articleInfo).then(function (resp) {
                    $location.path('/');
                }, function (error) {
                    $scope.errors = error.data;
                    $.notify("Có lỗi xảy ra, Bạn vui lòng tải lại trang và thao tác lại!", "error");
                });
            }
        },
        cancel: function ()
        {
            $location.path('/');
        },
        getAllCategory: function () {
            $categoryService.actions.getAllCategory().then(function (resp) {
                $apply(function () {
                    $scope.categorys = resp.data;
                });

            }, function (error) {
                console.log(error);
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
        },
        build_thumnail: function (path)
        {
            if (path != '')
                return SiteUrl + path;
            return '';
        },
        singleNews: function (articleID)
        {
            $articleService.actions.getSingleArticle(articleID).then(function (resp) {
                $apply(function () {
                    $scope.articleInfo = resp.data;
                    $.each($('.chkCat'), function (i, v)
                    {
                        var value = parseInt($(v)[0].value) || null;
                        if ($scope.articleInfo.category.indexOf(value) < 0)
                        {
                            $(v)[0].checked = false;
                        } else
                        {
                            $(v)[0].checked = true;
                        }
                    });
                    $('#txtContent').val($scope.articleInfo.content);
                    $('#txtbegin_date').val($scope.articleInfo.begin_date);
                    $('#txtend_date').val($scope.articleInfo.end_date);
                });

            }, function (error) {
                console.log(error);
                $.notify("Có lỗi xảy ra khi lấy đanh sách chuyên mục!", "error");
            });
        },
        loadAddress: function ()
        {
            $addressService.action.listCity([]).then(function (resp) {
                $apply(function () {
                    $scope.allCity = resp.data;
                });
            }, function (error) {
                console.log(error)
            });

            $addressService.action.listDistrict([]).then(function (resp) {
                $apply(function () {
                    $scope.allDistrict = resp.data;
                });
            }, function (error) {
                console.log(error)
            });
            $addressService.action.listVillage([]).then(function (resp) {
                $apply(function () {
                    $scope.allVillage = resp.data;
                });
            }, function (error) {
                console.log(error)
            });
            $addressService.action.listStreet([]).then(function (resp) {
                $apply(function () {
                    $scope.allStreet = resp.data;
                });

            }, function (error) {
                console.log(error)
            });
        },
        renderAddress: function ()
        {
            $apply(function () {
                if ($scope.articleInfo.articleBase.city_id)
                {
                    $.each($scope.allCity, function (i, v) {
                        if (v.id == $scope.articleInfo.articleBase.city_id)
                        {
                            $scope.articleInfo.articleBase.address = v.name;
                        }
                    });

                }


                if ($scope.articleInfo.articleBase.district_id)
                {
                    $.each($scope.allDistrict, function (i, v) {
                        if (v.id == $scope.articleInfo.articleBase.district_id)
                        {
                            $scope.articleInfo.articleBase.address += ' ' + v.name;
                        }
                    });
                }


                if ($scope.articleInfo.articleBase.village_id)
                {
                    $.each($scope.allVillage, function (i, v) {
                        if (v.id == $scope.articleInfo.articleBase.village_id)
                        {
                            $scope.articleInfo.articleBase.address += ' ' + v.name;
                        }
                    });

                }


                if ($scope.articleInfo.articleBase.street_id)
                {
                    $.each($scope.allStreet, function (i, v) {
                        if (v.id == $scope.articleInfo.articleBase.street_id)
                        {
                            $scope.articleInfo.articleBase.address += ' ' + v.name;
                        }
                    });

                }
            });
        }

    };
    $scope.$watchCollection('articleInfo.title', function (oldVal, newVal) {
        $scope.articleInfo.slug = Slug.slugify($scope.articleInfo.title);
    });



    $scope.actions.getAllCategory();
    $scope.actions.loadAllTags();
    $scope.actions.loadAddress();

    if ($routeParams.id && $routeParams.id > 0)
    {
        //load single post
        $scope.actions.singleNews($routeParams.id);
    }

});