@extends('Frontend.Layouts.default')
@section('title', 'Chi tiets tin bài')
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
<!--    .banner
    <div class="container-fluid">
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
            </div>
        </div>
    </div>end .banner
    <div class="container">   
        .filter
        <div class="page-single-filter select-group">
            <div class="row">
                <div class="col-xs-12 box-filter">
                    <div class="pull-left">
                        <button class="btn btn-icon btn-sm btn-circle btn-default"><i class="fa fa-search"></i></button>
                        <span>Tìm tin rao bán</span>
                    </div>
                    <button class="pull-right btn btn-default btn-sm">Tìm kiếm</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-15 col-sm-4 col-xs-6">
                    <select class="form-control">
                        <option value="">Loại nhà đất ...</option>
                        <option value="">Đất sổ đỏ</option>
                        <option value="">Đất sổ hồng</option>
                        <option value="">Trung cư</option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6">
                    <select class="form-control">
                        <option value="">Thành phố ...</option>
                        <option value="">Hà Nội</option>
                        <option value="">Hải Phòng</option>
                        <option value="">Hồ Chí Minh</option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6">
                    <select class="form-control">
                        <option value="">Quận/Huyện ...</option>
                        <option value="">500,000,000</option>
                        <option value="">1,000,000,000</option>
                        <option value="">2,000,000,000</option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6">
                    <select class="form-control">
                        <option value="">Phường/Xã...</option>
                        <option value="">100m</option>
                        <option value="">200m</option>
                        <option value="">300m</option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6">
                    <select class="form-control">
                        <option value="">Hướng nhà ...</option>
                        <option value="">Đông</option>
                        <option value="">Tây</option>
                        <option value="">Nam</option>
                        <option value="">Bắc</option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6">
                    <select class="form-control">
                        <option value="">Giá thấp nhất ...</option>
                        <option value="">Đất sổ đỏ</option>
                        <option value="">Đất sổ hồng</option>
                        <option value="">Trung cư</option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6">
                    <select class="form-control">
                        <option value="">Giá cao nhất ...</option>
                        <option value="">Hà Nội</option>
                        <option value="">Hải Phòng</option>
                        <option value="">Hồ Chí Minh</option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6">
                    <select class="form-control">
                        <option value="">DT nhỏ nhất ...</option>
                        <option value="">500,000,000</option>
                        <option value="">1,000,000,000</option>
                        <option value="">2,000,000,000</option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6">
                    <select class="form-control">
                        <option value="">DT lớn...</option>
                        <option value="">100m</option>
                        <option value="">200m</option>
                        <option value="">300m</option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6">
                    <select class="form-control">
                        <option value="">Số phòng ...</option>
                        <option value="">Đông</option>
                        <option value="">Tây</option>
                        <option value="">Nam</option>
                        <option value="">Bắc</option>
                    </select>
                </div>
            </div>
        </div>
    </div>end filter-->
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
                    <span class="padding-right-15"><i class="fa fa-home" aria-hidden="true"></i> Diện tích: 85 m2</span>
                    <span class="padding-right-15"><i class="fa fa-bed" aria-hidden="true"></i> 3 phòng ngủ</span>
                    <span class="padding-right-15"><i class="fa fa-bed" aria-hidden="true"></i> 2 phòng tắm</span>
                    <span><i class="fa fa-bed" aria-hidden="true"></i> 1 Gara ô tô</span>
                </div>
                <div class="content-single">
                    <p>
                        Lorem Ipsum is simply dummy test of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy test ever since the 1500s, When an unknowing printer took a 
                        gally of type and scrambled it to make a type specimen book.
                        gally of type and scrambled it to make a type specimen book.
                    </p>

                </div>
                <div class="row action-single">
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <button  class="btn btn-sm btn-success">Quan tâm</button>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <button  class="btn btn-sm btn-default">Không chính chủ</button>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <button  class="btn btn-sm btn-danger">Sai số liên lạc</button>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <button  class="btn btn-sm btn-info">Đã giao dịch</button>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <button  class="btn btn-sm btn-warning">Thông tin sai</button>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <button  class="btn btn-sm btn-primary">Thông báo khác</button>
                    </div>
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
                                <span class="info-describe-time">Cập nhật: 3 giờ trước</span>
                            </div>
                            <div class="row tab-content">
                                <div id="info" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Giá: $ 3.5 tỷ/căn
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Hướng nhà: Đông nam
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Gara ô tô: 1 gara
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Đang sale: Có
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Số tầng: 7 tầng
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Phòng tắm: 2 phòng
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Loại BDS: Nhà đất
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Số phòng: 6 phòng
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Địa chỉ: hà nội
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Diện tích: 62m2
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Tình trạng: Còn nhà
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> State: OH
                                        </div>
                                    </div>
                                </div>
                                <div id="describe" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Giá: $ 3.5 tỷ/căn
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Hướng nhà: Đông nam
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Gara ô tô: 1 gara
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Đang sale: Có
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Số tầng: 7 tầng
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Phòng tắm: 2 phòng
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Loại BDS: Nhà đất
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Số phòng: 6 phòng
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Địa chỉ: hà nội
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <i class="fa fa-check-square-o "></i> Diện tích: 62m2
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="info-single-more">
                            <h4>Bán nhà mặt đường Quang Trung, Hà Nội - Liên hệ xem nhà.</h4>
                            <h5 class="text-justify">1. Chính chủ cho thuê nhà 71</h5>
                            <p>
                                Lorem Ipsum is simply dummy test of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy test ever since the 1500s, 
                                When an unknowing printer took a gally of type and scrambled it to make a type specimen book.
                                When an unknowing printer took a gally of type and scrambled it to make a type specimen book.
                            </p>
                            <h5 class="text-justify">2. Chính chủ cho thuê nhà 72</h5>
                            <p>
                                Lorem Ipsum is simply dummy test of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy test ever since the 1500s, 
                                When an unknowing printer took a gally of type and scrambled it to make a type specimen book.
                                When an unknowing printer took a gally of type and scrambled it to make a type specimen book.
                            </p>
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
                                    <h2 class="title-content" data-toggle="popover" title="Tin bất động sản tương tự" 
                                        data-placement="top" data-trigger="hover"
                                        data-content="Lorem Ipsum is simply dummy test of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy test ever since the 1500s,
                                        When an unknowing printer took 
                                        a gally of type and scrambled it to make a type specimen book.">
                                        Tin bất động sản tương tự</h2>
                                </div>
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
                                                <h2>Bán nhà mặt phố Quang Trung, Hà Nội - chính chủ</h2>
                                                <div class="article-time">
                                                    <span>Cập nhật: <time>6 tiếng trước</time></span>
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
                                                <img src="{{url('Frontend')}}/images/article1_3.png" class="img-responsive" alt=""/>
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
                                                <img src="{{url('Frontend')}}/images/article1_5.png" class="img-responsive" alt=""/>
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
                                                <img src="{{url('Frontend')}}/images/article1_7.png" class="img-responsive" alt=""/>
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
                                                <img src="{{url('Frontend')}}/images/article1_9.png" class="img-responsive" alt=""/>
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
                        </div><!-- end .content-left-col -->
                    </div>
                </div>
            </div> <!--end .content-left-->
             @includeif('Frontend.partial._right_sidebar_single_page')
        </div>
    </div>
</section><!--end .content-->

@endsection