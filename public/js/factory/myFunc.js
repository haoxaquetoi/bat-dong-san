ngApp.factory('$myFunc', function ($rootScope, $http)
{
    var func =  {};
    
    func.hasData = function(param){
        if(!param)
        {
            return false;
        }
        
        if(typeof param == 'object')
        {
            return (Object.keys(param).length > 0) ? true: false;
        }
        
        if(typeof param == 'array')
        {
            return (param.length > 0) ? true: false;
        }
        
        return true;
    }
    
    return func;
});