<!--header-top-->
<div class="header-top">
    <div class="container">
        <div class="row ">
            <div class="col-sm-6 col-xs-12 borber-xs-1">
                <ul class="nav navbar-nav">
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li class="active"><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-skype"></i></a></li>
                    <li><a href=""><i class="fa fa-envelope-square"></i></a></li>
                    <li><a href=""><i class="fa fa-rss"></i></a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-xs-12">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=""><i class="fa fa-phone"></i> Gọi ngay : 01230.456.789</a></li>
                    <li><a href=""><i class="fa fa-user"></i> Đăng nhập</a></li>
                    <li><a href=""><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!--end .header-top-->
<!--.menu-top-->
<div class="container menu-top">
    <nav class="navbar">
        <div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="helper"></span>
                <a class="navbar-brand" href="#">
                    <img src="{{url('Frontend')}}/images/logo2.png" class="img-responsive" alt="" alt="logo"/> 
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">
                <ul class="nav navbar-nav navbar-right width-sm-50">
                    <li class="active"><a href="">Trang chủ</a></li>
                    <li><a href="">Tin rao bán</a></li>
                    <li><a href="">Dịch vụ</a></li>
                    <li><a href="">Liên hệ</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div><!--end .menu-top-->
<!--.banner-->
<div class="container-fluid">
    <div class="row">
        <div class="banner">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-wrap="false" data-interval="3000" data-pause="null">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{url('Frontend')}}/images/banner.png" class="img-responsive" alt="banner"/>
                    </div>
                </div>
            </div>
            <div class=" text-uppercase banner-contact">
                <img src="{{url('Frontend')}}/images/check.png" alt=""/>
                Liên hệ thẳng, giao dịch thật
            </div>
            <!--                <div class="banner-more container">
                                <div class="project-new">
                                    <h3 class="bold text-uppercase">Dự án mới</h3>
                                    <p>Lorem Ipsum is simply dummy test of the printing and typesetting industry.<br/>
                                        Lorem Ipsum has been the industry's standard dummy test ever since the 1500s,
                                        When an unknowing printer took a gally of type and scrambled it to make a type specimen book.
                                    </p>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-success">Xem thêm...</button>
                                    <button class="btn btn-success filter"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>-->
            <div class="banner-search ">
                <div class="input-group">
                    <input type="text" class="input-banner-search form-control" placeholder="Tìm kiếm: Tên đường, quận, huyện, thành phố ..."/> 
                    <div class="input-group-btn">
                        <button class="btn btn-success">Tìm đảm bảo</button>
                        <button class="btn btn-success filter">Tìm kiếm</button>
                    </div><!-- /btn-group -->
                </div><!-- /input-group -->
            </div>
        </div>
    </div>
</div><!--end .banner-->
<!--.filter-->
<div class="filter select-group">
    <div class="container">                     
        <div class="row">
            <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">
                <select class="form-control">
                    <option value="">Loại nhà đất ...</option>
                    <option value="">Đất sổ đỏ</option>
                    <option value="">Đất sổ hồng</option>
                    <option value="">Trung cư</option>
                </select>
            </div>
            <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">
                <select class="form-control">
                    <option value="">Thành phố ...</option>
                    <option value="">Hà Nội</option>
                    <option value="">Hải Phòng</option>
                    <option value="">Hồ Chí Minh</option>
                </select>
            </div>
            <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">
                <select class="form-control">
                    <option value="">Giá thấp nhất ...</option>
                    <option value="">500,000,000</option>
                    <option value="">1,000,000,000</option>
                    <option value="">2,000,000,000</option>
                </select>
            </div>
            <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">
                <select class="form-control">
                    <option value="">DT nhỏ nhất...</option>
                    <option value="">100m</option>
                    <option value="">200m</option>
                    <option value="">300m</option>
                </select>
            </div>
            <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">
                <select class="form-control">
                    <option value="">Hướng nhà ...</option>
                    <option value="">Đông</option>
                    <option value="">Tây</option>
                    <option value="">Nam</option>
                    <option value="">Bắc</option>
                </select>
            </div>
        </div>
    </div>
    <button class="btn btn-success btn-icon btn-circle"><i class="fa fa-caret-down" aria-hidden="true"></i></button>
</div><!--end filter-->