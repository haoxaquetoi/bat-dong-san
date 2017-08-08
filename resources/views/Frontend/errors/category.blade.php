@extends('Frontend.Layouts.default')
@section('title', 'Trang chủ')
@section('content')

<h1>
    <?php
    switch ($errorCode) {
        case 'notFound':
            echo 'Chuyên mục không tồn tại';
            break;
        default :
            echo 'Lỗi không xác định';
            break;
    }
    ?>
    <a href="{{url('')}}" >Về trang chủ</a></h1>


@endsection

