@extends('backend.layouts.default')
@section('title', 'Test rest feedback')
@section('myJs')
<!--service-->
<script src="{{ URL::asset('backend/js/factory/services/feedbackService.js') }}"></script>
<script>
ngApp.controller('testFeedbackCtrl', function ($scope, $apply, $feedbackService)
{
    var action = {
        insert: function () {
            $feedbackService.action.insert(
                    {
                        name: 'Quang123',
                        order: 1,
                        status: 1,
                    }
            ).then(function (res) {
                console.log(res.data);
            }, function (err) {
                console.log(err);
            });
        },
        update: function () {
            $feedbackService.action.update(1,
                    {
                        name: 'Test update',
                        order: 1,
                        status: 1,
                    }
            ).then(function (res) {
                console.log(res.data);
            }, function (err) {
                console.log(err);
            });
        },
        delete: function () {
            $feedbackService.action.delete(1).then(function (res) {
                console.log(res.data);
            }, function (err) {
                console.log(err);
            });
        },
        list: function(){
            $feedbackService.action.list({
                freeText: '123',
                page: '1',
                pageSize: '15',
            }).then(function (res) {
                console.log(res.data);
            }, function (err) {
                console.log(err);
            });
        },
        info: function(){
            $feedbackService.action.info(2).then(function (res) {
                console.log(res.data);
            }, function (err) {
                console.log(err);
            });
        }
    };

    //test insert
    action.list();
});
</script>
@endsection

@section('content')
<div ng-controller="testFeedbackCtrl">
</div>
@endsection