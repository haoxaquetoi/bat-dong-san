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
                            <a href="?" class="btn btn-grey all {{ (old( 'cs' ) == '') ? 'active' : '' }}">Tất cả</a>
                            <a href="?cs=1" class="btn btn-grey {{ (old( 'cs' ) == 1 ) ? 'active' : '' }}">Tin đảm bảo</a>
                            <a  href="?cs=0" class="btn btn-grey {{(old ( 'cs' ) == 0 && old( 'cs' ) != '') ? 'active' : ''}}">Tin thường</a>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 box-filter-right  padding-bottom-10">
                            <div class="pull-right  text-right">
                                <button class="btn btn-grey tow-column"><i class="fa fa-th-list" aria-hidden="true"></i></button>
                                <button class="btn btn-grey one-column"><i class="fa fa-th" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class="margin-0 padding-bottom-15">
                        Tin bất động sản tương tự
                    </h1>
                </div>
                <div class="content-category">
                    <div class="row">
                        @if (count($dataView['allArticleInvolve']) > 0)
                        @foreach ($dataView['allArticleInvolve'] as $values)
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">

                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <a href="{{app('BuildUrl')->buildArticleDetail( $values->category[0]->slug,$values->category[0]->category_id, $values->slug,  $values->id)}}" >
                                                @if (isset($values->thumbnail))
                                                <img src="{{url('') . $values->thumbnail}}" class="pull-right" alt=""/>
                                                @else
                                                <img src="{{url('Frontend')}}/images/default.png" class="pull-right" alt=""/>
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
                                                {!! str_limit($values->content, $limit = 100, $end = '...') !!}
                                            </p>
                                            <p class="bold article-right-content">
                                                @if(isset($values->articleOther->floor_area) && $values->articleOther->floor_area > 0)
                                                <span class="padding-right-15">
                                                    <i class="fa fa-home" aria-hidden="true"></i> Diện tích: {{$values->articleOther->floor_area}} m2
                                                </span>
                                                @endif
                                                @if(isset($values->articleOther->number_of_bedrooms) && $values->articleOther->number_of_bedrooms > 0)
                                                <span class="padding-right-15"><i class="fa fa-bed" aria-hidden="true"></i> 
                                                    {{$values->articleOther->number_of_bedrooms}} phòng ngủ
                                                </span>
                                                @endif
                                                @if(isset($values->articleOther->number_of_wc) && $values->articleOther->number_of_wc > 0)
                                                <span class="padding-right-15"><i class="fa fa-bed" aria-hidden="true"></i>  
                                                    {{$values->articleOther->number_of_wc}} phòng tắm
                                                </span>
                                                @endif
                                                @if(isset($values->articleOther->number_of_storeys) && $values->articleOther->number_of_storeys > 0)
                                                <span class="padding-right-15"><i class="fa fa-home" aria-hidden="true"></i>  
                                                    {{$values->articleOther->number_of_storeys}} Tầng
                                                </span>
                                                @endif
                                                @if(isset($values->articleBase->address) && $values->articleBase->address != '')
                                                <span class="padding-right-15"><i class="fa fa-map-marker" aria-hidden="true"></i>  
                                                    {{$values->articleBase->address}}
                                                </span>
                                                @endif
                                            </p>
                                            <div class="text-right view-details">
                                                @if ((int) $values->is_censored > 0)
                                                <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-left" alt=""/>
                                                @endif
                                                <a  href="{{app('BuildUrl')->buildArticleDetail( $values->category[0]->slug,$values->category[0]->category_id, $values->slug , $values->id)}}" class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
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
            @includeif('Frontend.partial._right_sidebar_search')
        </div>
    </div>
</section><!--end .content-->

@endsection