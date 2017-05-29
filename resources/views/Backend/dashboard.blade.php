@extends('Backend.Layouts.layoutDefault')
@section('title', 'Giao diện trang quản trị backend')
@section('content')
{{Auth::user()}}
<h1>Nội dung backends<h1>

@endsection
