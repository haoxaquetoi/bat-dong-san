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
                onsole.log(resp);
            }, function (error) {
                console.log(error);
            });
        },
        addnewProduct: function ()
        {
            var params = {
                id: 91,
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
                    address: '',
                    price: 22,
                    myself: 0
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

            $articleService.actions.insert(params).then(function (resp) {
                onsole.log(resp);
            }, function (error) {
                console.log(error);
            });
        },
        delete: function () {

        },
        edit: function ()
        {

        }
    }
});
