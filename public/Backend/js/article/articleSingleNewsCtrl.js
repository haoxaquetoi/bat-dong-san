ngApp.controller('articleSingleNewsCtrl', function ($scope, $location)
{
    $scope.typeArticle = 'news';
    $scope.actions = {
        changePage: function(){
            console.log(1);
            $location.path('/singleProduct/0');
        }
    };
});