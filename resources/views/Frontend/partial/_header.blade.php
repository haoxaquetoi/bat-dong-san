<!--header-top-->
<div ng-controller="headerCtrl">
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
                    <a class="navbar-brand" href="{{ url('')}}">
                        <img src="{{url('Frontend')}}/images/logo2.png" class="img-responsive" alt="" alt="logo"/> 
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">
                    <widget position-code="positionCode" widget-data="widgetData"></widget>
                </div><!--/.nav-collapse -->
                
            </div>
        </nav>
    </div><!--end .menu-top-->
    <!--.banner-->
    <form action="{{url('/tim-kiem')}}" method="GET">
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
                    <div class="banner-search ">
                        <div class="input-group">
                            <input value="{{ old('kw')}}" type="text" name="kw" class="input-banner-search form-control" placeholder="Tìm kiếm: Tên đường, quận, huyện, thành phố ..."/> 
                            <div class="input-group-btn">
                                <button class="btn btn-success" type="button">Tìm đảm bảo</button>
                                <button class="btn btn-success filter"  type="submit">Tìm kiếm</button>
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
                        <select class="form-control" name="cg">
                            <option value="">Loại nhà đất ...</option>
                            @foreach ($dataView['paramsSearch']['category'] as $category) 
                            <option value='{{$category-> id}}' {{($category->id == old ( 'cg' ) ? 'selected' : '')}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">
                        <select class="form-control" name="ct">
                            <option value="">Thành phố ...</option>
                            @foreach ($dataView['paramsSearch']['city'] as $city) 
                            <option value='{{$city->id}}' {{($city->id == old ( 'ct' ) ? 'selected' : '')}}>{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">
                        <select class="form-control" name="pmi">
                            <option value="">Giá thấp nhất ... </option>
                            @foreach ($dataView['paramsSearch']['priceMin'] as $priceMinCode => $priceMin) 
                            <option value='{{$priceMinCode}}' {{($priceMinCode == old ( 'pmi' ) ? 'selected' : '')}}>{{$priceMin}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">
                        <select class="form-control" name="pma">
                            <option value="">Giá cao nhất ... </option>
                            @foreach ($dataView['paramsSearch']['priceMax'] as $priceMaxCode => $priceMax)
                            <option value='{{$priceMaxCode}}' {{($priceMaxCode == old ( 'pma' ) ? 'selected' : '')}}>{{$priceMax}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">

                        <select class="form-control" name="dh">
                            <option value="">Hướng nhà ...</option>
                            @foreach ($dataView['paramsSearch']['direction'] as $directionCode => $direction) 
                            <option value='{{$directionCode}}' {{($directionCode == old ( 'dh' ) ? 'selected' : '')}}>{{$direction}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10 filter-hide">
                        <select class="form-control" name="dt">
                            <option value="">Quận, huyện ...</option>
                            @foreach ($dataView['paramsSearch']['district'] as $values) 
                            <option value='{{$values->id}}' {{($values->id == old ( 'dt' ) ? 'selected' : '')}}>{{$values->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10 filter-hide">
                        <select class="form-control" name="vil">
                            <option value="">Phường, xã ...</option>
                            @foreach ($dataView['paramsSearch']['village'] as $values) 
                            <option value='{{$values->id}}' {{($values->id == old ( 'vil' ) ? 'selected' : '')}}>{{$values->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10 filter-hide">
                        <select class="form-control" name="fami">
                            <option value="">Diện tích nhỏ nhất ... </option>
                            @foreach ($dataView['paramsSearch']['floorAreaMin'] as $values) 
                            <option value='{{$values->floor_area}}' {{($values->floor_area == old ( 'fami' ) ? 'selected' : '')}}>{{$values->floor_area}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10 filter-hide">
                        <select class="form-control" name="fama">
                            <option value="">Diện tích lớn nhất ... </option>
                            @foreach ($dataView['paramsSearch']['floorAreaMax'] as $values)
                            <option value='{{$values->floor_area}}'  {{($values->floor_area == old ( 'fama' ) ? 'selected' : '')}}>{{$values->floor_area}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10 filter-hide">
                        <select class="form-control" name="rn">
                            <option value="">Số phòng ...</option>
                            @foreach ($dataView['paramsSearch']['roomNumber'] as $values) 
                            <option value='{{$values->number_of_bedrooms}}'  {{($values->number_of_bedrooms == old ( 'rn' ) ? 'selected' : '')}}>{{$values->number_of_bedrooms}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="btn btn-success btn-icon btn-circle btn-more-filter" type="button"><i class="fa fa-caret-down" aria-hidden="true"></i></button>
            </div>
        </div><!--end filter-->
    </form>
</div>