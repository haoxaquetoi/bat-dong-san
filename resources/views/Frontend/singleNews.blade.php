@extends('Frontend.Layouts.default')
@section('title', 'Chi tiết tin bài')
@section('content')

<link href="{{url('Frontend')}}/css/pageSingle.css" rel="stylesheet" type="text/css"/>
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
            <div class="col-md-8 col-sm-12 col-xs-12 content-left">
                <div class="row slide-single">
                    <div class="col-md-12">
                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                            <li data-thumb="{{url('Frontend')}}/images/single.png"> 
                                <img src="{{url('Frontend')}}/images/single.png" />
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="title-single">
                    @isset($dataView['arrSingleArticle']->articleOther->floor_area)
                    <span class="padding-right-15">
                        <i class="fa fa-home" aria-hidden="true"></i> Diện tích: {{$dataView['arrSingleArticle']->articleOther->floor_area}} m2
                    </span>
                    @endisset
                    @isset($dataView['arrSingleArticle']->articleOther->number_of_bedrooms)
                    <span class="padding-right-15"><i class="fa fa-bed" aria-hidden="true"></i> 
                        {{$dataView['arrSingleArticle']->articleOther->number_of_bedrooms}} phòng ngủ
                    </span>
                    @endisset
                    @isset($dataView['arrSingleArticle']->articleOther->number_of_wc)
                    <span class="padding-right-15"><i class="fa fa-bed" aria-hidden="true"></i>  
                        {{$dataView['arrSingleArticle']->articleOther->number_of_wc}} phòng tắm
                    </span>
                    @endisset
                    @isset($dataView['arrSingleArticle']->articleOther->number_of_storeys)
                    <span class="padding-right-15"><i class="fa fa-home" aria-hidden="true"></i>  
                        {{$dataView['arrSingleArticle']->articleOther->number_of_storeys}} Tầng
                    </span>
                    @endisset
                </div>
                <div class="content-single">
                    {!! $dataView['arrSingleArticle']->content !!}
                </div>
                <div class="row action-single">
                    @for ($i = 0; $i < count($dataView['arrAllFeedback']); $i ++)
                    @if($i% 6 == 0)
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <button  class="btn btn-sm btn-success">{{$dataView['arrAllFeedback'][$i]->name}}</button>
                    </div>
                    @elseif($i% 6 == 1)
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <button  class="btn btn-sm btn-default">{{$dataView['arrAllFeedback'][$i]->name}}</button>
                    </div>
                    @elseif($i% 6 == 2)
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <button  class="btn btn-sm btn-danger">{{$dataView['arrAllFeedback'][$i]->name}}</button>
                    </div>
                    @elseif($i% 6 == 3)
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <button  class="btn btn-sm btn-info">{{$dataView['arrAllFeedback'][$i]->name}}</button>
                    </div>
                    @elseif($i% 6 == 4)
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <button  class="btn btn-sm btn-warning">{{$dataView['arrAllFeedback'][$i]->name}}</button>
                    </div>
                    @else
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <button  class="btn btn-sm btn-primary">{{$dataView['arrAllFeedback'][$i]->name}}</button>
                    </div>
                    @endif
                    @endfor
                </div>
                <div class="borber-img">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="info-describe">
                            <div class="info-describe-nav">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#info">Thông tin nhà</a></li>
                                    <li><a data-toggle="tab" href="#describe">Mô tả</a></li>
                                </ul>
                                <span class="info-describe-time">Cập nhật: <time>{{ Carbon\Carbon::parse($dataView['arrSingleArticle']->begin_date)->format('d-m-Y') }}</time></span>
                            </div>
                            <div class="row tab-content">
                                <div id="info" class="tab-pane fade in active">
                                    <div class="row">
                                        @isset($dataView['arrSingleArticle']->articleBase->price)
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-dollar"></i> Giá:  {{number_format($dataView['arrSingleArticle']->articleBase->price, 0)}}
                                        </div>
                                        @endisset
                                        @isset($dataView['arrSingleArticle']->articleOther->facade)
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Mặt tiền: {{$dataView['arrSingleArticle']->articleOther->facade}}
                                        </div>
                                        @endisset
                                        @isset($dataView['arrSingleArticle']->articleOther->entry_width)
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Hướng vào: {{$dataView['arrSingleArticle']->articleOther->entry_width}}
                                        </div>
                                        @endisset
                                        @isset($dataView['arrSingleArticle']->articleOther->house_direction)
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Hướng nhà: {{$dataView['arrSingleArticle']->articleOther->house_direction}}
                                        </div>
                                        @endisset
                                        @isset($dataView['arrSingleArticle']->articleOther->balcony_direction)
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Hướng ban công: {{$dataView['arrSingleArticle']->articleOther->balcony_direction}}
                                        </div>
                                        @endisset

                                        @isset($dataView['arrSingleArticle']->articleOther->number_of_storeys)
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Số tầng: {{$dataView['arrSingleArticle']->articleOther->number_of_storeys}} tầng
                                        </div>
                                        @endisset
                                        @isset($dataView['arrSingleArticle']->articleOther->floor_area)
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Diện tích: {{$dataView['arrSingleArticle']->articleOther->floor_area}} m2
                                        </div>
                                        @endisset
                                        @isset($dataView['arrSingleArticle']->articleOther->number_of_bedrooms)
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-bed"></i> Số phòng: {{$dataView['arrSingleArticle']->articleOther->number_of_bedrooms}} phòng
                                        </div>
                                        @endisset
                                        @isset($dataView['arrSingleArticle']->articleOther->number_of_wc)
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-bed"></i> Tolet: {{$dataView['arrSingleArticle']->articleOther->number_of_wc}} phòng
                                        </div>
                                        @endisset
                                        @if($dataView['arrSingleArticle']->is_censored == 1)
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Tin đảm bảo
                                        </div>
                                        @endif
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Tình trạng: 
                                            @if($dataView['arrSingleArticle']->is_sold == 1)
                                            Đã bán
                                            @else
                                            Còn hàng
                                            @endif
                                        </div>
                                        @isset($dataView['arrSingleArticle']->articleBase->address)
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-map-marker"></i> Địa chỉ: {{$dataView['arrSingleArticle']->articleBase->address}}
                                        </div>
                                        @endisset
                                    </div>
                                </div>
                                <div id="describe" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            {!! $dataView['arrSingleArticle']->articleOther->furniture !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <!--.content-left-col-->
                        <div class="content-left-col">
                            <div class="content-left-col-border">
                                <div class="text-uppercase title">
                                    <h2 class="title-content" data-toggle="popover" title="Danh sách quan tâm" 
                                        data-placement="top" data-trigger="hover"
                                        data-content="Lorem Ipsum is simply dummy test of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy test ever since the 1500s,
                                        When an unknowing printer took 
                                        a gally of type and scrambled it to make a type specimen book.">
                                        Danh sách quan tâm
                                    </h2>
                                </div>
                                <article>
                                    <div class="row">
                                        <div class="col-xs-5 article-left">
                                            <div class="article-left-relative">
                                                <img src="{{url('Frontend')}}/images/article1_1a.png" class="img-responsive" alt=""/>
                                                <div class="article-rectangle"></div>
                                                <div class="article-action">
                                                    <button class="btn btn-success" ><i class="fa fa-search"></i></button>
                                                    <button class="btn btn-success" ><i class="fa fa-link"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-7 article-right">
                                            <header>
                                                <h2>Bán nhà mặt phố Quang Trung, Hà Nội - chính chủ</h2>
                                                <div class="article-time">
                                                    <span>Cập nhật: <time>6 tiếng trước</time></span>
                                                    <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-right" alt=""/>
                                                </div>

                                            </header>
                                            <section>
                                                <p><i class="fa fa-home" aria-hidden="true"></i> Diện tích: 85 m2</p>
                                                <p><i class="fa fa-bed" aria-hidden="true"></i> 3 phòng ngủ, 2 phòng tắm</p>
                                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Quận/Huyện, Phường/Xã</p>
                                                <p><i class="fa fa-dollar" aria-hidden="true"></i> Giá: 3 tỷ/căn</p>
                                            </section>
                                        </div>
                                    </div>
                                </article>
                                <article>
                                    <div class="row">
                                        <div class="col-xs-5 article-left">
                                            <div class="article-left-relative">
                                                <img src="{{url('Frontend')}}/images/single.png" class="img-responsive" alt=""/>
                                                <div class="article-rectangle"></div>
                                                <div class="article-action">
                                                    <button class="btn btn-success" ><i class="fa fa-search"></i></button>
                                                    <button class="btn btn-success" ><i class="fa fa-link"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-7 article-right">
                                            <header>
                                                <h2>Bán nhà mặt phố Quang Trung, Hà Nội - chính chủ</h2>
                                                <div class="article-time">
                                                    <span>Cập nhật: <time>6 tiếng trước</time></span>
                                                    <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-right" alt=""/>
                                                </div>

                                            </header>
                                            <section>
                                                <p><i class="fa fa-home" aria-hidden="true"></i> Diện tích: 85 m2</p>
                                                <p><i class="fa fa-bed" aria-hidden="true"></i> 3 phòng ngủ, 2 phòng tắm</p>
                                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Quận/Huyện, Phường/Xã</p>
                                                <p><i class="fa fa-dollar" aria-hidden="true"></i> Giá: 3 tỷ/căn</p>
                                            </section>
                                        </div>
                                    </div>
                                </article>
                                <article>
                                    <div class="row">
                                        <div class="col-xs-5 article-left">
                                            <div class="article-left-relative">
                                                <img src="{{url('Frontend')}}/images/article1_4.png" class="img-responsive" alt=""/>
                                                <div class="article-rectangle"></div>
                                                <div class="article-action">
                                                    <button class="btn btn-success" ><i class="fa fa-search"></i></button>
                                                    <button class="btn btn-success" ><i class="fa fa-link"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-7 article-right">
                                            <header>
                                                <h2>Bán nhà mặt phố Quang Trung, Hà Nội - chính chủ</h2>
                                                <div class="article-time">
                                                    <span>Cập nhật: <time>6 tiếng trước</time></span>
                                                    <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-right" alt=""/>
                                                </div>

                                            </header>
                                            <section>
                                                <p><i class="fa fa-home" aria-hidden="true"></i> Diện tích: 85 m2</p>
                                                <p><i class="fa fa-bed" aria-hidden="true"></i> 3 phòng ngủ, 2 phòng tắm</p>
                                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Quận/Huyện, Phường/Xã</p>
                                                <p><i class="fa fa-dollar" aria-hidden="true"></i> Giá: 3 tỷ/căn</p>
                                            </section>
                                        </div>
                                    </div>
                                </article>
                                <article>
                                    <div class="row">
                                        <div class="col-xs-5 article-left">
                                            <div class="article-left-relative">
                                                <img src="{{url('Frontend')}}/images/article1_6.png" class="img-responsive" alt=""/>
                                                <div class="article-rectangle"></div>
                                                <div class="article-action">
                                                    <button class="btn btn-success" ><i class="fa fa-search"></i></button>
                                                    <button class="btn btn-success" ><i class="fa fa-link"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-7 article-right">
                                            <header>
                                                <h2>Bán nhà mặt phố Quang Trung, Hà Nội - chính chủ</h2>
                                                <div class="article-time">
                                                    <span>Cập nhật: <time>6 tiếng trước</time></span>
                                                    <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-right" alt=""/>
                                                </div>

                                            </header>
                                            <section>
                                                <p><i class="fa fa-home" aria-hidden="true"></i> Diện tích: 85 m2</p>
                                                <p><i class="fa fa-bed" aria-hidden="true"></i> 3 phòng ngủ, 2 phòng tắm</p>
                                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Quận/Huyện, Phường/Xã</p>
                                                <p><i class="fa fa-dollar" aria-hidden="true"></i> Giá: 3 tỷ/căn</p>
                                            </section>
                                        </div>
                                    </div>
                                </article>
                                <article>
                                    <div class="row">
                                        <div class="col-xs-5 article-left">
                                            <div class="article-left-relative">
                                                <img src="{{url('Frontend')}}/images/article1_8.png" class="img-responsive" alt=""/>
                                                <div class="article-rectangle"></div>
                                                <div class="article-action">
                                                    <button class="btn btn-success" ><i class="fa fa-search"></i></button>
                                                    <button class="btn btn-success" ><i class="fa fa-link"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-7 article-right">
                                            <header>
                                                <h2>Bán nhà mặt phố Quang Trung, Hà Nội - chính chủ</h2>
                                                <div class="article-time">
                                                    <span>Cập nhật: <time>6 tiếng trước</time></span>
                                                    <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-right" alt=""/>
                                                </div>

                                            </header>
                                            <section>
                                                <p><i class="fa fa-home" aria-hidden="true"></i> Diện tích: 85 m2</p>
                                                <p><i class="fa fa-bed" aria-hidden="true"></i> 3 phòng ngủ, 2 phòng tắm</p>
                                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Quận/Huyện, Phường/Xã</p>
                                                <p><i class="fa fa-dollar" aria-hidden="true"></i> Giá: 3 tỷ/căn</p>
                                            </section>
                                        </div>
                                    </div>
                                </article>
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
                                        Tin bất động sản tương tự</h2>
                                </div>
                                @isset ($dataView['arrSingleArticleInvolve'])
                                @foreach ($dataView['arrSingleArticleInvolve'] as $values)
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
                                                @isset($values->articleOther->floor_area)
                                                <p><i class="fa fa-home" aria-hidden="true"></i> Diện tích: {{$values->articleOther->floor_area}} m2</p>
                                                @endisset
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
                                @endisset
                                <div class="text-right padding-right-15">
                                    <a class="btn btn-default btn-more-category" href="">Xem thêm <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end .content-left-col -->
                    </div>
                </div>
            </div> <!--end .content-left-->
            @includeif('Frontend.partial._right_sidebar_single_page')
        </div>
    </div>
</section><!--end .content-->

@endsection