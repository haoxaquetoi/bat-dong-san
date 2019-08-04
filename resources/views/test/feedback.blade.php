@extends('Backend.Layouts.default')
@section('title', 'Test rest feedback')
@section('myJs')
<!--service-->
<script src="{{ URL::asset('backend/js/factory/services/feedbackService.js') }}"></script>
<script>
ngApp.controller('testFeedbackCtrl', function ($scope, $apply, $feedbackService)
{
    var action = {
        insert: function () {
            return $feedbackService.action.insert(
                    {
                        name: 'Quang123',
                        order: 1,
                        status: 1,
                    }
            );
        },
        update: function (id) {
            return $feedbackService.action.update(id,
                    {
                        name: 'Test update',
                        order: 1,
                        status: 1,
                    }
            );
        },
        delete: function (id) {
            return $feedbackService.action.delete(id);
        },
        list: function(){
            $feedbackService.action.list({
                freeText: '',
                page: '1',
                pageSize: '15',
            });
        },
        info: function(id){
            $feedbackService.action.info(id);
        }
    };
    
    var tmpId = '';
    //test insert
    action.insert()
    .then(function(res){
        console.log('insert ok');
        return res.data.id;
    })
    .then(function(id){
        tmpId = id;
        return action.update(id);
    })
    .then(function(res){
        console.log('update ok')
        return action.list();
    })
    .then(function(res){
        console.log('list ok')
        return action.info(tmpId);
    })
    .then(function(res){
        console.log('info ok')
        return action.delete(tmpId);
    })
    .then(function(res){
        console.log('delete ok')
    })
    .catch(function(err){
        console.log(err);
    });
    
});
</script>
@endsection

@section('content')
<div ng-controller="testFeedbackCtrl">
</div>
@endsection