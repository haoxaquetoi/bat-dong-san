ngApp.controller('widgetListCtrl', function ($scope, $apply, $widgetService)
{
    $scope.listWidget;
    $scope.listWidgetPosition;

    //lay du lieu
    $scope.data = {
        getAll: function () {
            $scope.data.listWidget().then(function (resp) {//thuc hien lay widget type
                $scope.data.successListWidget(resp.data);
                return true;
            }).then(function () { //thuc hien lay position
                $widgetService.action.listPosition().then(function (resp) {
                    $scope.data.successListPosition(resp.data);
                }).catch(function (err) {
                    console.log(err);
                });
            }).catch(function (err) {
                console.log(err);
            });
        },
        getPosition: function(){
            $scope.data.listPosition().then(function(resp){
                $scope.data.successListPosition(resp.data);
            }).catch(function(err){
                console.log(err);
            });
        },
        listWidget: function () {
            return $widgetService.action.listType();
        },
        listPosition: function () {
            return $widgetService.action.listPosition();
        },
        successListWidget: function (data) {
            $apply(function () {
                $scope.listWidget = data;
            });
        },
        successListPosition: function (data) {
            console.log(data);
            $apply(function () {
                $scope.listWidgetPosition = data;
            });
        }
    };


    $scope.actions = {
        insertItem: function (widgetType, evt, positionCode) {
            if(typeof widgetType != 'object')//tranh truong hop nham vs drag khi order
            {
                var data = new $widgetService.data.insertItem(positionCode, widgetType, {}, 1);
                $widgetService.action.insertItem(data).then(function(resp){
                    $scope.data.getPosition();
                });
            }
        },
        deleteWidget: function (widgetId) {
            $widgetService.action.deleteItem(widgetId).then(function(resp){
                $scope.data.getPosition();
            }).catch(function(err){
                console.log(err);
            });
        },
        reOrder: function(data, order){
            var postData = new $widgetService.data.reOrderItem(data.id, data.position_code, order);
            $widgetService.action.reOrderItem(postData).then(function(resp){
                $scope.data.getPosition();
            }).catch(function(err){
                console.log(err);
            });
        }
    };

    //lay du lieu
    $scope.data.getAll();
});