@extends('Frontend.Layouts.default')
@section('meta')
<meta name="keywords" content="{!! $dataView['arrSingleArticle']->title !!}" />
<meta name="description" content="<?php  echo str_limit(strip_tags(html_entity_decode($dataView['arrSingleArticle']->content)), $limit = 250, $end = '...') ?>" />
@endsection
@section('title', $dataView['arrSingleArticle']->title)
@section('content')

<link href="{{url('frontend')}}/css/pageSingle.css" rel="stylesheet" type="text/css"/>
<script>
    $(document).ready(function () {
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover();
        });

        $('#image-gallery').lightSlider({
            gallery: true,
            item: 1,
            thumbItem: 5,
            slideMargin: 0,
            speed: 1000,
            pause: 5000,
            auto: true,
            loop: true,
            onSliderLoad: function () {
                $('#image-gallery').removeClass('cS-hidden');
            }
        });
    });
</script>
<!--.content-->
<section class="content">
    <div class="container">
        <div class="row">
            <!--.content-left-->
            <div class="col-md-9 col-sm-12 col-xs-12 content-left">
                <div class="row slide-single">
                    <div class="col-md-12">
                        <h1>
                            {{$dataView['arrSingleArticle']->title}}
                        </h1>
                        <div class="article-time">
                            <span>Cập nhật: <time>{{ Carbon\Carbon::parse($dataView['arrSingleArticle']->begin_date)->format('d-m-Y') }}</time></span>
                        </div>
                        <div class="bold">
                            {!! $dataView['arrSingleArticle']->summary !!}
                        </div>
                        <div>
                            {!! $dataView['arrSingleArticle']->content !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--.content-left-col-->
                    <div class="content-left-col content-left-col-2">
                        <div class="content-left-col-border">
                            <div class="text-uppercase title">
                                <h2 class="title-content">
                                    <a href="{{ url('tin-lien-quan') }}/{{$dataView['arrSingleArticle']->id}}">
                                        Tin tương tự
                                    </a>
                                </h2>
                            </div>
                            @isset ($dataView['arrSingleArticleInvolve'])
                            @foreach ($dataView['arrSingleArticleInvolve'] as $values)
                            <div class="col-md-6 col-sm-6 col-xs-12 box-article-new-involve">
                                <article>
                                    <div class="row">
                                        <div class="col-xs-5 article-left">
                                            <div class="article-left-relative">
                                                <a href="{{app('BuildUrl')->buildArticleDetail( $values->category[0]->slug,$values->category[0]->category_id, $values->slug,  $values->id)}}" >
                                                    @if (isset($values->thumbnail))
                                                    <img src="{{url('') . $values->thumbnail}}" class="pull-right" alt=""/>
                                                    @else
                                                    <img src="{{url('frontend')}}/images/default.png" class="pull-right" alt=""/>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xs-7 article-right">
                                            <header>
                                                <h2>
                                                    <a href="{{app('BuildUrl')->buildArticleDetail( $values->category[0]->slug,$values->category[0]->category_id, $values->slug,  $values->id)}}" >
                                                        {{$values->title}}
                                                    </a>
                                                </h2>
                                                <div class="article-time">
                                                    <span>Cập nhật: <time>{{ Carbon\Carbon::parse($values->begin_date)->format('d-m-Y') }}</time></span>
                                                </div>
                                            </header>
                                            <section>
                                                <p>
                                                    {!! str_limit($values->content, $limit = 200, $end = '...') !!}
                                                </p>
                                            </section>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                            @endisset
                            <div class="col-md-12 col-sm-12 col-xs-12 text-right padding-right-15 padding-top-15">
                                <a class="btn btn-default btn-more-category" href="{{ url('tin-lien-quan') }}/{{$dataView['arrSingleArticle']->id}}">Xem thêm <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div><!-- end .content-left-col -->
                </div>
            </div> <!--end .content-left-->
            @includeif('Frontend.partial._right_sidebar_news')
        </div>
    </div>
</section><!--end .content-->

@endsection