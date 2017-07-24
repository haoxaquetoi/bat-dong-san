ngApp.controller('articleCtrl', function ($scope, $apply, $articleService, Slug)
{
    $scope.actions = {
        addnewNews: function ()
        {
            var params = {
                type: 'News',
                title: 'tiêu đề',
                slug: 'tieu-de-1',
                content: 'Nội dung',
                summary: 'tóm tắt',
                thumbnail: '/z',
                tags: [],
                is_sticky: 0,
                status: 'Publish',
                begin_date: '', //Y-m-d H:i:s
                end_date: '', //Y-m-d H:i:s
                category: [1, 2]
            };

            $articleService.actions.insert(params).then(function (resp) {
                console.log(resp);
            }, function (error) {
                console.log(error);
            });
        },
        addnewProduct: function ()
        {
            var params = {
                type: 'Product',
                title: 'tiêu đề',
                slug: 'tieu-de-1',
                content: 'Nội dung',
                summary: 'tóm tắt',
                thumbnail: '/z',
                is_sticky: 0,
                tags: [],
                is_censored: 0,
                status: 'Publish',
                begin_date: '', //Y-m-d H:i:s
                end_date: '', //Y-m-d H:i:s
                category: [1, 2],
                articleBase: {
                    city_id: 1,
                    district_id: 1,
                    village_id: 1,
                    street_id: 1,
                    address: 'Số 1 ngõ 352 đường Trương Định phường Tương Mai quận Hoàng Mai Hà Nội',
                    price: 22,
                    myself: 0
                },
                articleContact: {
                    name: 'Phạm Văn Hưởng',
                    address: 'Thanh Hà Hải Dương',
                    phone: '0868605579',
                    mobile: '0868605579',
                    email: 'phamvanhuong.hd@gmail.com'
                },
                articleOther: {
                    facade: '1',
                    entry_width: '20',
                    house_direction: '22',
                    balcony_direction: 'North',
                    number_of_storeys: '12',
                    number_of_wc: '2',
                    number_of_bedrooms: '3',
                    furniture: ''
                }
            };

            $articleService.actions.insert(params).then(function (resp) {
                console.log(resp);
            }, function (error) {
                console.log(error);
            });
        },
        delete: function () {

        },
        editNews: function ()
        {
            var params = {
                id: 1,
                type: 'News',
                title: 'tiêu đề',
                slug: 'tieu-de-1',
                content: 'Nội dung',
                summary: 'tóm tắt',
                thumbnail: '/z',
                tags: [],
                is_sticky: 0,
                status: 'Publish',
                begin_date: '', //Y-m-d H:i:s
                end_date: '', //Y-m-d H:i:s
                category: [1, 2]
            };

            $articleService.actions.edit(params).then(function (resp) {
                console.log(resp);
            }, function (error) {
                console.log(error);
            });
        },
        editProduct: function ()
        {
            var params = {
                id: 2,
                type: 'Product',
                title: 'tiêu đề',
                slug: 'tieu-de-1',
                content: 'Nội dung',
                summary: 'tóm tắt',
                thumbnail: '/z',
                is_sticky: 0,
                tags: [],
                is_censored: 0,
                status: 'Publish',
                begin_date: '', //Y-m-d H:i:s
                end_date: '', //Y-m-d H:i:s
                category: [1, 2],
                articleBase: {
                    city_id: 1,
                    district_id: 1,
                    village_id: 1,
                    street_id: 1,
                    address: 'Số 1 ngõ 352 đường Trương Định phường Tương Mai quận Hoàng Mai Hà Nội',
                    price: 22,
                    myself: 0
                },
                articleContact: {
                    name: 'Phạm Văn Hưởng',
                    address: 'Thanh Hà Hải Dương',
                    phone: '0868605579',
                    mobile: '0868605579',
                    email: 'phamvanhuong.hd@gmail.com'
                },
                articleOther: {
                    facade: '1',
                    entry_width: '20',
                    house_direction: '22',
                    balcony_direction: 'North',
                    number_of_storeys: '12',
                    number_of_wc: '2',
                    number_of_bedrooms: '3',
                    furniture: ''
                }
            };

            $articleService.actions.edit(params).then(function (resp) {
                console.log(resp);
            }, function (error) {
                console.log(error);
            });
        },
        getAll: function ()
        {
            var params = {
                type:'Product'
            };
            $articleService.actions.getAll(params).then(function (resp) {
                console.log(resp);
            }, function (error) {
                console.log(error);
            });
        }
    }
});
