@extends('Frontend.Layouts.default')
@section('title', 'Chi tiết chuyên mục')
@section('content')

<link href="{{url('Frontend')}}/css/category.css" rel="stylesheet" type="text/css"/>
<script>
    $(document).ready(function () {
        $('.tow-column').click(function () {
            $('.box-category').removeClass('col-md-12 col-sm-12 col-md-6 col-sm-6');
            $('.article-left').removeClass('col-xs-4 col-xs-5');
            $('.article-right').removeClass('col-xs-8 col-xs-7');
            $('.box-category').addClass('col-md-6 col-sm-6');
            $('.article-left').addClass('col-xs-5');
            $('.article-right').addClass('col-xs-7');
        });
        $('.one-column').click(function () {
            $('.box-category').removeClass('col-md-6 col-sm-6 col-md-12 col-sm-12');
            $('.article-left').removeClass('col-xs-4 col-xs-5');
            $('.article-right').removeClass('col-xs-8 col-xs-7');
            $('.box-category').addClass('col-md-12 col-sm-12');
            $('.article-left').addClass('col-xs-4');
            $('.article-right').addClass('col-xs-8');
        });
    });
</script>
<!--.content-->
<section class="content">
    <!--.banner-->
<!--    <div class="container-fluid">
        <div class="row">
            <div class="banner">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="null">
                     Wrapper for slides 
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="{{url('Frontend')}}/images/banner.png" class="img-responsive" alt="banner"/>
                        </div>
                        <div class="item">
                            <img src="{{url('Frontend')}}/images/banner.png" class="img-responsive" alt="banner"/>
                        </div>
                    </div>
                </div>
                <div class=" text-uppercase banner-contact">
                    <img src="{{url('Frontend')}}/images/check.png" alt=""/>
                    Liên hệ thẳng, giao dịch thật
                </div>
                <div class="container article-price">
                    <div class="">
                        <div class="btn-article-price text-uppercase">
                            Tin rao bán
                        </div>
                        <div class="article-price-content">
                            <span>Lorem Ipsum is simply dummy test of the printing and typesetting.</span>
                        </div>
                    </div>
                </div>
                <div class="banner-search ">
                    <div class="input-group">
                        <input type="text" class="input-banner-search form-control" placeholder="Tìm kiếm: Tên đường, quận, huyện, thành phố ..."/> 
                        <div class="input-group-btn">
                            <button class="btn btn-success">Tìm đảm bảo</button>
                            <button class="btn btn-success filter">Tìm kiếm</button>
                        </div> /btn-group 
                    </div> /input-group 
                </div>
            </div>
        </div>
    </div>end .banner-->
    <div class="container">
        <div class="row">
            <!--.content-left-->
            <div class="col-md-9 col-sm-12 col-xs-12 content-left">
                <!--.category-filter-->
                <div class="category-filter">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 box-filter padding-bottom-10">
                            <button class="btn btn-success">Tất cả</button>
                            <button class="btn btn-grey">Tin thường</button>
                            <button class="btn btn-grey">Tin đảm bảo</button>
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
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-left" alt=""/>
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-left" alt=""/>
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-left" alt=""/>
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <img src="{{url('Frontend')}}/images/dam_bao.png" class="pull-left" alt=""/>
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-bottom-45 box-category">
                            <article>
                                <div class="row">
                                    <div class="col-xs-5 article-left">
                                        <div class="article-left-relative">
                                            <img src="{{url('Frontend')}}/images/left-chuyen-muc.png" class="img-responsive" alt=""/>
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
                                    <div class="col-xs-7 article-right">
                                        <header>
                                            <h2>Bán nhà mặt phố Quang Trung, Hà Nội</h2>
                                            <div class="article-time">
                                                <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <a class="btn btn-default btn-xs btn-more-category" href="">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
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