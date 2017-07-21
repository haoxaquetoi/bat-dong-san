ngApp.controller('articleSingleProductCtrl', function ($scope, $location)
{
    $scope.typeArticle = 'product';
    $scope.actions = {
        changePage: function(){
            $location.path('/singleNews/0');
        }
    };
});