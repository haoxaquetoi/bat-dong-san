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
                                    <h2 class="title-content" data-toggle="popover" title="Tin đảm bảo" 
                                        data-placement="top" data-trigger="hover"
                                        data-content="Lorem Ipsum is simply dummy test of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy test ever since the 1500s,
                                        When an unknowing printer took 
                                        a gally of type and scrambled it to make a type specimen book.">
                                        Tin đảm bảo
                                    </h2>
                                </div>
                                <?php foreach ($dataView['arrArticleCensored'] as $values) : ?>
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
                                                    <h2>{{$values->title}}</h2>
                                                    <div class="article-time">
                                                        <span>Cập nhật: <time>{{$values->begin_date}}</time></span>
                                                        <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-right" alt=""/>
                                                    </div>

                                                </header>
                                                <section>
                                                    <p><i class="fa fa-home" aria-hidden="true"></i> Diện tích: 85 m2</p>
                                                    <p><i class="fa fa-bed" aria-hidden="true"></i> 3 phòng ngủ, 2 phòng tắm</p>
                                                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$values->articleBase->district_name}}-{{$values->articleBase->city_name}}</p>
                                                    <p><i class="fa fa-dollar" aria-hidden="true"></i> Giá: 3 tỷ/căn</p>
                                                </section>
                                            </div>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
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
                                    <h2 class="title-content" data-toggle="popover" title="Tin thường" 
                                        data-placement="top" data-trigger="hover"
                                        data-content="Lorem Ipsum is simply dummy test of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy test ever since the 1500s,
                                        When an unknowing printer took 
                                        a gally of type and scrambled it to make a type specimen book.">
                                        Tin thường</h2>
                                </div>
                                <?php foreach ($dataView['arrArticle'] as $values) : ?>
                                    <article>
                                        <div class="row">
                                            <div class="col-xs-5 article-left">
                                                <div class="article-left-relative">
                                                    <img src="{{url('Frontend')}}/images/article1_1.png" class="img-responsive" alt=""/>
                                                    <div class="article-rectangle"></div>
                                                    <div class="article-action">
                                                        <button class="btn btn-success" ><i class="fa fa-search"></i></button>
                                                        <button class="btn btn-success" ><i class="fa fa-link"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-7 article-right">
                                                <header>
                                                    <h2>{{$values->title}}</h2>
                                                    <div class="article-time">
                                                        <span>Cập nhật: <time>{{$values->begin_date}}</time></span>
                                                    </div>

                                                </header>
                                                <section>
                                                    <p><i class="fa fa-home" aria-hidden="true"></i> Diện tích: 85 m2</p>
                                                    <p><i class="fa fa-bed" aria-hidden="true"></i> 3 phòng ngủ, 2 phòng tắm</p>
                                                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$values->articleBase->district_name}}-{{$values->articleBase->city_name}}</p>
                                                    <p><i class="fa fa-dollar" aria-hidden="true"></i> Giá: 3 tỷ/căn</p>
                                                </section>
                                            </div>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
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
                <h2 class="title-content" data-toggle="popover" title="Tin nổi bật" 
                    data-placement="top" data-trigger="hover"
                    data-content="Lorem Ipsum is simply dummy test of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy test ever since the 1500s,
                    When an unknowing printer took 
                    a gally of type and scrambled it to make a type specimen book.">
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
                        <!--.item-->
                        <div class="item active">
                            <div class="row">
                                <?php foreach ($dataView['arrArticleSticky'] as $values) : ?>
                                <div class="col-md-4 col-sm-4 col-xs-12 slide-column-left padding-bottom-15">
                                    <article>
                                        <header>
                                            <div class="article-highlights-img">
                                                <div class="article-left-relative">
                                                    <img src="{{url('Frontend')}}/images/article2_2.png" class="img-responsive" alt=""/>
                                                    <div class="article-rectangle"></div>
                                                    <div class="article-action">
                                                        <button class="btn btn-success" ><i class="fa fa-search"></i></button>
                                                        <button class="btn btn-success" ><i class="fa fa-link"></i></button>
                                                    </div>
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
                                                        <p><i class="fa fa-bed"></i> 3 phòng ngủ</p>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4 price">
                                                        <p><i class="fa fa-dollar"></i> Giá: 3 tỷ/căn</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </header>
                                        <section>
                                            <h3 class="text-center">Nhà đất khu Quang Trung, HN</h3>
                                            <p class="text-center">Lorem Ipsum is simply dummy test of the </p>
                                            <p class="text-center">typesetting industry. Lorem Ipsum</p>
                                        </section>
                                    </article>
                                </div>
                                <?php endforeach; ?>
                                <div class="col-md-4 col-sm-4 col-xs-12 slide-column-center padding-bottom-15">
                                    <article>
                                        <header>
                                            <div class="article-highlights-img">
                                                <div class="article-left-relative">
                                                    <img src="{{url('Frontend')}}/images/article2_1.png" class="img-responsive" alt=""/>
                                                    <div class="article-rectangle"></div>
                                                    <div class="article-action">
                                                        <button class="btn btn-success" ><i class="fa fa-search"></i></button>
                                                        <button class="btn btn-success" ><i class="fa fa-link"></i></button>
                                                    </div>
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
                                                        <p><i class="fa fa-bed"></i> 3 phòng ngủ</p>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4 price">
                                                        <p><i class="fa fa-dollar"></i> Giá: 3 tỷ/căn</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </header>
                                        <section>
                                            <h3 class="text-center">Nhà đất khu Quang Trung, HN</h3>
                                            <p class="text-center">Lorem Ipsum is simply dummy test of the</p>
                                            <p class="text-center">typesetting industry. Lorem Ipsum</p>
                                        </section>
                                    </article>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 slide-column-right padding-bottom-15">
                                    <article>
                                        <header>
                                            <div class="article-highlights-img">
                                                <div class="article-left-relative">
                                                    <img src="{{url('Frontend')}}/images/article2_2.png" class="img-responsive" alt=""/>
                                                    <div class="article-rectangle"></div>
                                                    <div class="article-action">
                                                        <button class="btn btn-success" ><i class="fa fa-search"></i></button>
                                                        <button class="btn btn-success" ><i class="fa fa-link"></i></button>
                                                    </div>
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
                                                        <p><i class="fa fa-bed"></i> 3 phòng ngủ</p>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4 price">
                                                        <p><i class="fa fa-dollar"></i> Giá: 3 tỷ/căn</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </header>
                                        <section>
                                            <h3 class="text-center">Nhà đất khu Quang Trung, HN</h3>
                                            <p class="text-center">Lorem Ipsum is simply dummy test of the </p>
                                            <p class="text-center">typesetting industry. Lorem Ipsum</p>
                                        </section>
                                    </article>
                                </div>
                            </div>
                        </div><!-- end .item -->
                        <!--.item-->
                        <div class="item">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12 slide-column-left padding-bottom-15">
                                    <article>
                                        <header>
                                            <div class="article-highlights-img">
                                                <div class="article-left-relative">
                                                    <img src="{{url('Frontend')}}/images/article2_2.png" class="img-responsive" alt=""/>
                                                    <div class="article-rectangle"></div>
                                                    <div class="article-action">
                                                        <button class="btn btn-success" ><i class="fa fa-search"></i></button>
                                                        <button class="btn btn-success" ><i class="fa fa-link"></i></button>
                                                    </div>
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
                                                        <p><i class="fa fa-bed"></i> 3 phòng ngủ</p>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4 price">
                                                        <p><i class="fa fa-dollar"></i> Giá: 3 tỷ/căn</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </header>
                                        <section>
                                            <h3 class="text-center">Nhà đất khu Quang Trung, HN</h3>
                                            <p class="text-center">Lorem Ipsum is simply dummy test of the </p>
                                            <p class="text-center">typesetting industry. Lorem Ipsum</p>
                                        </section>
                                    </article>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 slide-column-center padding-bottom-15">
                                    <article>
                                        <header>
                                            <div class="article-highlights-img">
                                                <div class="article-left-relative">
                                                    <img src="{{url('Frontend')}}/images/article2_1.png" class="img-responsive" alt=""/>
                                                    <div class="article-rectangle"></div>
                                                    <div class="article-action">
                                                        <button class="btn btn-success" ><i class="fa fa-search"></i></button>
                                                        <button class="btn btn-success" ><i class="fa fa-link"></i></button>
                                                    </div>
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
                                                        <p><i class="fa fa-bed"></i> 3 phòng ngủ</p>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4 price">
                                                        <p><i class="fa fa-dollar"></i> Giá: 3 tỷ/căn</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </header>
                                        <section>
                                            <h3 class="text-center">Nhà đất khu Quang Trung, HN</h3>
                                            <p class="text-center">Lorem Ipsum is simply dummy test of the </p>
                                            <p class="text-center">typesetting industry. Lorem Ipsum</p>
                                        </section>
                                    </article>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 slide-column-right padding-bottom-15">
                                    <article>
                                        <header>
                                            <div class="article-highlights-img">
                                                <div class="article-left-relative">
                                                    <img src="{{url('Frontend')}}/images/article2_2.png" class="img-responsive" alt=""/>
                                                    <div class="article-rectangle"></div>
                                                    <div class="article-action">
                                                        <button class="btn btn-success" ><i class="fa fa-search"></i></button>
                                                        <button class="btn btn-success" ><i class="fa fa-link"></i></button>
                                                    </div>
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
                                                        <p><i class="fa fa-bed"></i> 3 phòng ngủ</p>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4 price">
                                                        <p><i class="fa fa-dollar"></i> Giá: 3 tỷ/căn</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </header>
                                        <section>
                                            <h3 class="text-center">Nhà đất khu Quang Trung, HN</h3>
                                            <p class="text-center">Lorem Ipsum is simply dummy test of the</p>
                                            <p class="text-center">typesetting industry. Lorem Ipsum</p>
                                        </section>
                                    </article>
                                </div>
                            </div>
                        </div><!-- end .item -->
                    </div>
                </div>


            </div>
        </div>
    </div> <!--end .article-highlights-->
</section><!--end .content-->

@endsection