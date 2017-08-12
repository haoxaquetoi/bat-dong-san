@extends('Frontend.Layouts.default')
@section('title', 'Chi tiết chuyên mục')
@section('content')

<link href="{{url('Frontend')}}/css/category.css" rel="stylesheet" type="text/css"/>
<!--.content-->
<section class="content" id="singleCategory">
    <div class="container">
        <div class="row">
            <!--.content-left-->
            <div class="col-md-9 col-sm-12 col-xs-12 content-left">
                <!--.category-filter-->
                <div class="category-filter">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 box-filter padding-bottom-10 category-censored">
                            <a href="?censored=''" class="btn btn-success">Tất cả</a>
                            <a href="?censored=1" class="btn btn-grey">Tin đảm bảo</a>
                            <a  href="?censored=0" class="btn btn-grey">Tin thường</a>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 box-filter-right  padding-bottom-10">
                            <div class="pull-left">
                                <button class="btn btn-grey">Trước</button>
                                <button class="btn btn-success">1</button>
                                <button class="btn btn-grey">2</button>
                                <button class="btn btn-grey">3</button>
                                <button class="btn btn-grey">Sau</button>
                            </div>
                            <div class="pull-right  text-right">
                                <button class="btn btn-grey tow-column"><i class="fa fa-th-list" aria-hidden="true"></i></button>
                                <button class="btn btn-grey one-column"><i class="fa fa-th" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-category">
                    <div class="row">
                        @if (count($dataView['allArticle']) > 0)
                        @foreach ($dataView['allArticle'] as $values)
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">

                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            @if (isset($values->thumbnail))
                                            <img src="{{url('') . $values->thumbnail}}" class="pull-right" alt=""/>
                                            @else
                                            <img src="{{url('Frontend')}}/images/default.png" class="pull-right" alt=""/>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>
                                                <a href="{{app('BuildUrl')->buildArticleDetail($values->id, $values->slug, $values->catID, $values->catSlug)}}">
                                                    {{$values->title}}
                                                </a>
                                            </h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>{{ Carbon\Carbon::parse($values->begin_date)->format('d-m-Y') }}</time></span>
                                            </div>

                                        </header>
                                        <section>
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and 
                                                typesetting industry
                                            </p>
                                            <p class="bold article-right-content">
                                                <span class="padding-right-10"><i class="fa fa-home" aria-hidden="true"></i> Diện tích: 85 m2</span>
                                                <span class="padding-right-10"><i class="fa fa-bed" aria-hidden="true"></i> 3 phòng ngủ</span>
                                                <span class="padding-right-10"><i class="fa fa-bed" aria-hidden="true"></i> 2 phòng tắm</span>
                                                <span class="padding-right-10"><i class="fa fa-bed" aria-hidden="true"></i> 1 Gara ô tô</span>
                                                <span class="padding-right-10"><i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ: Phường xã, huyện, tỉnh</span>
                                            </p>
                                            <div class="text-right view-details">
                                                @if ((int) $values->is_censored > 0)
                                                <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-left" alt=""/>
                                                @endif
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 box-filter-right text-right pagging  padding-bottom-15">
                            <button class="btn btn-grey">Trước</button>
                            <button class="btn btn-success">1</button>
                            <button class="btn btn-grey">2</button>
                            <button class="btn btn-grey">3</button>
                            <button class="btn btn-grey">Sau</button>
                        </div>
                    </div>
                </div>
            </div> <!--end .content-left-->
            @includeif('Frontend.partial._right_sidebar_category')
        </div>
    </div>
</section><!--end .content-->

@endsection