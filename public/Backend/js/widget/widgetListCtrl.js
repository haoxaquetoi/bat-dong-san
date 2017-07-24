ngApp.controller('widgetListCtrl', function ($scope, $apply)
{
    $scope.listWidget = [
        {name: 'Audio'},
        {name: 'Bài viết mới'},
        {name: 'Chuyên mục'},
        {name: 'Menu'},
        {name: 'Widget 1'},
        {name: 'Widget 2'},
        {name: 'Widget 3'},
        {name: 'Widget 4'}
    ];
    $scope.listWidgetColumn = [
        {
            title: 'Foter 1',
            data: [
                {name: 'Bài viết mới'},
                {name: 'Chuyên mục'}
            ]
        },
        {
            title: 'Blog sidebar',
            data: [
                {name: 'Audio'}
            ]
        }
    ];
    $scope.actions = {
        drop: function (data, evt, item) {
            var index = item.data.indexOf(data);
            if (data) {
                item.data.push(data);
            }
        },
        drag: function (data, evt, item) {
            var index = item.data.indexOf(data);
            if (index > -1) {
                item.data.splice(index, 1);
            }
        },
        deleteWidget: function (listWidgetColumn, item) {
            var index = listWidgetColumn.data.indexOf(item);
            listWidgetColumn.data.splice(index, 1);
        }
    };
});