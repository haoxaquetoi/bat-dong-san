<!--header-top-->
<div ng-controller="headerCtrl">
    <div class="header-top">
        <div class="container">
            <div class="row ">
                <div class="col-sm-6 col-xs-12 borber-xs-1">
                    <!--                    <ul class="nav navbar-nav">
                                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                            <li class="active"><a href=""><i class="fa fa-facebook"></i></a></li>
                                            <li><a href=""><i class="fa fa-skype"></i></a></li>
                                            <li><a href=""><i class="fa fa-envelope-square"></i></a></li>
                                            <li><a href=""><i class="fa fa-rss"></i></a></li>
                                        </ul>-->
                </div>
                <div class="col-sm-6 col-xs-12">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href=""><i class="fa fa-phone"></i> Gọi ngay : 0973.901.982</a></li>
<!--                        <li><a href=""><i class="fa fa-user"></i> Đăng nhập</a></li>
                        <li><a href=""><i class="fa fa-search"></i></a></li>-->
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
                        <img src="{{url('frontend')}}/images/logo2.png" class="img-responsive" alt="" alt="logo"/> 
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">
                    <widget position-code="positionCode" widget-data="widgetData"></widget>
                </div><!--/.nav-collapse -->

            </div>
        </nav>
    </div><!--end .menu-top-->
    <!--.banner-->
    <input type="hidden" name="cs" class="cs" value="" />
    <div class="container-fluid">
        <div class="row">
            <div class="banner">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-wrap="false" data-interval="3000" data-pause="null">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="{{url('frontend')}}/images/banner.png" class="img-responsive" alt="banner"/>
                        </div>
                    </div>
                </div>
                <div class=" text-uppercase banner-contact">
                    <img src="{{url('frontend')}}/images/check.png" alt=""/>
                    Liên hệ thẳng, giao dịch thật
                </div>
                <div class="banner-search ">
                    @if(!isset($dataView['type']) || $dataView['type'] != 'News')
                    <form  ng-submit="action.search(0)" id="form-seach-header">
                        <div class="input-group">
                            <input ng-model="paramsUrl.kw" type="text" name="kw" class="input-banner-search form-control" placeholder="Tìm kiếm tiêu đề tin ..."/> 
                            <div class="input-group-btn">
                                <button class="btn btn-success" type="button" ng-click="action.search(1)">Tìm đảm bảo</button>
                                <button class="btn btn-success filter"  type="submit">Tìm kiếm</button>
                            </div><!-- /btn-group -->
                        </div><!-- /input-group -->
                    </form>
                    @else
                    <form action="{{url('/tim-kiem-tin-dang')}}" method="GET" id="form-seach-header">
                        <div class="input-group">
                            <input ng-model="paramsUrl.kw" type="text" name="kw" class="input-banner-search form-control" placeholder="Tìm kiếm tiêu đề tin ..."/> 
                            <div class="input-group-btn">
                                <button class="btn btn-success filter"  type="submit">Tìm kiếm</button>
                            </div><!-- /btn-group -->
                        </div><!-- /input-group -->
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div><!--end .banner-->
    <!--.filter-->
    @if(!isset($dataView['type']) || $dataView['type'] != 'News')
    <div class="filter select-group">
        <div class="container">                     
            <div class="row">
                <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">
                    <select class="form-control" name="cg" ng-model="paramsUrl.cg" ng-change="action.search()">
                        <option value="">Loại nhà đất ...</option>
                        <option ng-repeat="item in paramsSearch.category" value="@{{item.id}}">
                            @{{item.name}}
                        </option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">
                    <select class="form-control" name="ct" ng-model="paramsUrl.ct" ng-change="action.search()">
                        <option value="">Thành phố ...</option>
                        <option ng-repeat="item in paramsSearch.city" value="@{{item.id}}">
                            @{{item.name}}
                        </option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">
                    <select class="form-control" name="pmi" ng-model="paramsUrl.pmi" ng-change="action.search()">
                        <option value="">Giá thấp nhất ... </option>
                        <option ng-repeat="(key, value) in paramsSearch.priceMin" value="@{{key}}">
                            @{{value}}
                        </option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">
                    <select class="form-control" name="pma" ng-model="paramsUrl.pma" ng-change="action.search()">
                        <option value="">Giá cao nhất ... </option>
                        <option ng-repeat="(key, value) in paramsSearch.priceMax" value="@{{key}}">
                            @{{value}}
                        </option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10">

                    <select class="form-control" name="dh" ng-model="paramsUrl.dh" ng-change="action.search()">
                        <option value="">Hướng nhà ...</option>
                        <option ng-repeat="(key, value) in paramsSearch.direction" value="@{{key}}">
                            @{{value}}
                        </option>
                    </select>
                </div>

                <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10 filter-hide">
                    <select class="form-control" name="dt" ng-model="paramsUrl.dt" ng-change="action.search()">
                        <option value="">Quận, huyện ...</option>
                        <option ng-repeat="item in paramsSearch.district" value="@{{item.id}}" ng-show="(paramsUrl.ct == item.city_id)">
                            @{{item.name}}
                        </option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10 filter-hide">
                    <select class="form-control" name="vil" ng-model="paramsUrl.vil" ng-change="action.search()">
                        <option value="">Phường, xã ...</option>
                        <option ng-repeat="item in paramsSearch.village" value="@{{item.id}}" ng-show="(paramsUrl.dt == item.district_id)">
                            @{{item.name}}
                        </option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10 filter-hide">
                    <select class="form-control" name="fami" ng-model="paramsUrl.fami" ng-change="action.search()">
                        <option value="">Diện tích nhỏ nhất ... </option>
                        <option ng-repeat="item in paramsSearch.floorAreaMin" value="@{{item.floor_area}}">
                            @{{item.floor_area}}
                        </option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10 filter-hide">
                    <select class="form-control" name="fama" ng-model="paramsUrl.fama" ng-change="action.search()">
                        <option value="">Diện tích lớn nhất ... </option>
                        <option ng-repeat="item in paramsSearch.floorAreaMax" value="@{{item.floor_area}}">
                            @{{item.floor_area}}
                        </option>
                    </select>
                </div>
                <div class="col-md-15 col-sm-4 col-xs-6 padding-bottom-10 filter-hide">
                    <select class="form-control" name="rn" ng-model="paramsUrl.rn" ng-change="action.search()">
                        <option value="">Số phòng ...</option>
                        <option ng-repeat="item in paramsSearch.roomNumber" value="@{{item.number_of_bedrooms}}">
                            @{{item.number_of_bedrooms}}
                        </option>
                    </select>
                </div>
            </div>
            <button class="btn btn-success btn-icon btn-circle btn-more-filter" type="button"><i class="fa fa-caret-down" aria-hidden="true"></i></button>
        </div>
    </div><!--end filter-->
    @endif
</div>