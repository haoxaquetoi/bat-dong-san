@extends('Frontend.Layouts.default')
@section('title', 'Trang chủ')
@section('content')
<div class="container">
    <h1 class="padding-bottom-45 padding-top-15">
        <?php
        switch ($errorCode) {
            case 'notFound':
                echo 'Tin bài không tồn tại';
                break;
            default :
                echo 'Lỗi không xác định';
                break;
        }
        ?>
        <a href="{{url('')}}" >Về trang chủ</a>
    </h1>
</div>
@endsection

