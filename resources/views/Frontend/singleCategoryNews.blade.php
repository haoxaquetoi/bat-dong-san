@extends('Frontend.Layouts.default')
@section('meta')
<meta name="keywords" content="{!! $dataView['catInfo']->name !!}" />
<meta name="description" content="<?php  echo str_limit(strip_tags(html_entity_decode($dataView['catInfo']->name)), $limit = 250, $end = '...') ?>" />
@endsection
@section('title', $dataView['catInfo']->name)
@section('content')

<link href="{{url('frontend')}}/css/category.css" rel="stylesheet" type="text/css"/>
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
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 box-filter-right  padding-bottom-10">
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
                                            <p class="bold article-right-content">
                                            </p>
                                            <div class="text-right view-details">
                                                <a class="btn btn-default btn-xs btn-more-category" href="{{app('BuildUrl')->buildArticleDetail( $values->category[0]->slug,$values->category[0]->category_id, $values->slug,  $values->id)}}">Xem chi tiết <i class="fa fa-angle-right"></i></a>
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
                            @include('Frontend.partial._pagination_default', $dataView['paginator'])
                        </div>
                    </div>
                </div>
            </div> <!--end .content-left-->
            @includeif('Frontend.partial._right_sidebar_news')
        </div>
    </div>
</section><!--end .content-->

@endsection