@extends('Frontend.Layouts.default')
@section('title', 'Trang chủ')
@section('content')

<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>
<!--.content-->
<section class="content">
    <div class="container">
        <div class="row">
            <!--.content-left-->
            <div class="col-md-10 col-sm-12 col-xs-12 content-left">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <!--.content-left-col-->
                        <div class="content-left-col">
                            <div class="content-left-col-border">
                                <div class="text-uppercase title">
                                    <h2 class="title-content">
                                        Tin đảm bảo
                                    </h2>
                                </div>
                                @if (count($dataView['arrArticleCensored']) > 0)
                                @foreach ($dataView['arrArticleCensored'] as $values)
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
                                                <h2>{{$values->title}}</h2>
                                                <div class="article-time">
                                                    <span>Cập nhật: <time>{{ Carbon\Carbon::parse($values->begin_date)->format('d-m-Y') }}</time></span>
                                                    @if ((int) $values->is_censored > 0)
                                                    <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-right" alt=""/>
                                                    @endif
                                                </div>
                                            </header>
                                            <section>
                                                <p><i class="fa fa-home" aria-hidden="true"></i> Diện tích: 85 m2</p>
                                                @if ((int) $values->articleOther->number_of_bedrooms > 0  || (int) $values->articleOther->number_of_wc > 0)
                                                <p><i class="fa fa-bed" aria-hidden="true"></i> 
                                                    @if ((int) $values->articleOther->number_of_bedrooms > 0)
                                                    {{$values->articleOther->number_of_bedrooms}} phòng ngủ, 
                                                    @endif
                                                    @if ((int) $values->articleOther->number_of_wc > 0)
                                                    {{$values->articleOther->number_of_wc}} phòng tắm
                                                    @endif
                                                </p>
                                                @endif
                                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> 
                                                    {{$values->articleBase->district_name}}-{{$values->articleBase->city_name}}
                                                </p>
                                                <p><i class="fa fa-dollar" aria-hidden="true"></i> 
                                                    Giá: {{ number_format($values->articleBase->price, 0) }}
                                                </p>
                                            </section>
                                        </div>
                                    </div>
                                </article>
                                @endforeach
                                @endif
                                <div class="text-right padding-right-15">
                                    <a class="btn btn-default btn-more-category" href="">Xem thêm <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div> <!-- end .content-left-col -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <!--.content-left-col-->
                        <div class="content-left-col content-left-col-2">
                            <div class="content-left-col-border">
                                <div class="text-uppercase title">
                                    <h2 class="title-content">
                                        Tin thường</h2>
                                </div>
                                @if (count($dataView['arrArticle']) > 0)
                                @foreach ($dataView['arrArticle'] as $values)
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
                                                <h2>{{$values->title}}</h2>
                                                <div class="article-time">
                                                    <span>Cập nhật: <time>{{ Carbon\Carbon::parse($values->begin_date)->format('d-m-Y') }}</time></span>
                                                    @if ((int) $values->is_censored > 0)
                                                    <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-right" alt=""/>
                                                    @endif
                                                </div>
                                            </header>
                                            <section>
                                                <p><i class="fa fa-home" aria-hidden="true"></i> Diện tích: 85 m2</p>
                                                @if ((int) $values->articleOther->number_of_bedrooms > 0  || (int) $values->articleOther->number_of_wc > 0)
                                                <p><i class="fa fa-bed" aria-hidden="true"></i> 
                                                    @if ((int) $values->articleOther->number_of_bedrooms > 0)
                                                    {{$values->articleOther->number_of_bedrooms}} phòng ngủ, 
                                                    @endif
                                                    @if ((int) $values->articleOther->number_of_wc > 0)
                                                    {{$values->articleOther->number_of_wc}} phòng tắm
                                                    @endif
                                                </p>
                                                @endif
                                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> 
                                                    {{$values->articleBase->district_name}}-{{$values->articleBase->city_name}}
                                                </p>
                                                <p><i class="fa fa-dollar" aria-hidden="true"></i> 
                                                    Giá: {{ number_format($values->articleBase->price, 0) }}
                                                </p>
                                            </section>
                                        </div>
                                    </div>
                                </article>
                                @endforeach
                                @endif
                                <div class="text-right padding-right-15">
                                    <a class="btn btn-default btn-more-category" href="">Xem thêm <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end .content-left-col -->
                    </div>
                </div>
            </div> <!--end .content-left-->
            @includeif('Frontend.partial._right_sidebar_home_page')
        </div>
    </div>
    <!--.banner-footer-->
    <div class="banner-footer">
        <div class="container">
            <div class="text-center">
                <h3 class="text-uppercase bold">Dự án cho tương lai</h3>
                <p>Lorem Ipsum is simply dummy test of the printing and typesetting industry.<br/>
                    Lorem Ipsum has been the industry's standard dummy test ever since the 1500s,
                    When an unknowing printer took <br/>
                    a gally of type and scrambled it to make a type specimen book.
                </p>
                <button class="btn banner-footer-more text-uppercase">Xem thêm...</button>
            </div>
        </div>
    </div> <!--end .banner-footer-->
    <!--.article-highlights-->
    <div class="article-highlights">
        <div class="container">
            <div class="text-uppercase title">
                <h2 class="title-content">
                    Tin nổi bật</h2>
                <div class="pull-right">
                    <!-- Controls -->
                    <a class="btn btn-xs btn-default" href="#carousel-example-generic-footer" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="btn btn-xs btn-default" href="#carousel-example-generic-footer" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
            <div class="slide padding-top-7_5">
                <div id="carousel-example-generic-footer" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @if (count($dataView['arrArticle']) > 0)
                        @for ($i = 0; $i < count($dataView['arrArticleSticky']); $i = $i + 3)
                        <div class="item {{{($i == 0) ? 'active' : '' }}}">
                            <div class="row">
                                @for ($j = $i; ($j < $i + 3 && $j < count($dataView['arrArticleSticky'])); $j++)
                                <div class="col-md-4 col-sm-4 col-xs-12 slide-column-left padding-bottom-15">
                                    <article>
                                        <header>
                                            <div class="article-highlights-img">
                                                <div class="article-left-relative">
                                                    @if (isset($dataView['arrArticleSticky'][$j]->thumbnail))
                                                    <img src="{{url('') . $dataView['arrArticleSticky'][$j]->thumbnail}}" class="pull-right" alt=""/>
                                                    @else
                                                    <img src="{{url('Frontend')}}/images/default.png" class="pull-right" alt=""/>
                                                    @endif
                                                    <div class="sale-off">
                                                        <div class="btn-group">
                                                            <button class="btn btn-success btn-active-purple">
                                                                <span class="text-uppercase">Đang sale off</span><br />
                                                                <span class="price"><i class="fa fa-dollar"></i> 10Tr/m2</span>
                                                            </button>
                                                            <button class="btn btn-default btn-active-purple">
                                                                <i class="fa fa-tag"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="check-product">
                                                        <button class="btn text-uppercase" >Còn nhà</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-header">
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-4 acreage">
                                                        <p><i class="fa fa-home"></i> Diện tích: 85</p>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4 bed">
                                                        @if ((int) $dataView['arrArticleSticky'][$j]->articleOther->number_of_bedrooms > 0 || (int) $dataView['arrArticleSticky'][$j]->articleOther->number_of_wc > 0)
                                                        <p><i class="fa fa-bed"></i> 
                                                            @if ((int) $dataView['arrArticleSticky'][$j]->articleOther->number_of_bedrooms > 0)
                                                            {{$dataView['arrArticleSticky'][$j]->articleOther->number_of_bedrooms}} phòng ngủ
                                                            @elseif ((int) $dataView['arrArticleSticky'][$j]->articleOther->number_of_wc > 0)
                                                            {{$dataView['arrArticleSticky'][$j]->articleOther->number_of_wc}} phòng tắm
                                                            @endif
                                                        </p>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-4 col-xs-4 price">
                                                        <p><i class="fa fa-dollar"></i> Giá: {{number_format($dataView['arrArticleSticky'][$j]->articleBase->price, 0)}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </header>
                                        <section>
                                            <h3 class="text-center">{{$dataView['arrArticleSticky'][$j]->title}}</h3>
                                            <div class="text-center">
                                                {!! str_limit($dataView['arrArticleSticky'][$j]->content, $limit = 100, $end = '...') !!}
                                            </div>
                                        </section>
                                    </article>
                                </div>
                                @endfor
                            </div>
                        </div><!-- end .item -->
                        @endfor
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div> <!--end .article-highlights-->
</section><!--end .content-->

@endsection