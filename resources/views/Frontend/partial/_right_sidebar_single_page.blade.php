<script src="{{url('frontend')}}/js/ctrl/rightSidebarSingleCtrl.js"></script>
<!--.content-right-->
<div class="col-md-4 col-sm-12  col-xs-12 content-right" ng-controller="rightSidebarSingleCtrl">
    <div class="row content-right-single-page">
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="box-avata">
                    @if (isset($dataView['arrSingleArticle']->thumbnail))
                    <img src="{{url('') . $dataView['arrSingleArticle']->thumbnail}}" class="img-responsive" alt=""/>
                    @else
                    <img src="{{url('frontend')}}/images/default.png" class="img-responsive" alt=""/>
                    @endif
                </div>
                <div class="box-info-authors">
                    <div class="name-authors">{{$dataView['arrSingleArticle']->articleContact->name}} </div>
<!--                    <p class="content-authors">
                        Lorem Ipsum is simply dummy test of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy test ever since the 1500s, 
                    </p>-->
                    <ul class="list-unstyled">

                        <li>
                            <i class="fa fa-phone" aria-hidden="true"></i> Di động: {{$dataView['arrSingleArticle']->articleContact->mobile}}
                        </li>
                        @isset($dataView['arrSingleArticle']->articleContact->phone)
                        <li>
                            <i class="fa fa-mobile-phone"></i> Hotline: {{$dataView['arrSingleArticle']->articleContact->phone}}
                        </li>
                        @endisset
                        <li>
                            <i class="fa fa-paper-plane"></i> email: {{$dataView['arrSingleArticle']->articleContact->email}}
                        </li>
                        <li>
                            <i class="fa fa-map-marker"></i> Địa chỉ: {{$dataView['arrSingleArticle']->articleContact->address}}
                        </li>
                        @if($dataView['arrSingleArticle']->articleBase->myself == 1)
                        <li>
                            <i class="fa fa-check-square-o "></i> Chính chủ
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="box-search-right">
                    <div class="title-border">
                        Tìm kiếm nhanh
                        <button class="borber-radius-bottom"></button>
                    </div>
                    <form class="form-horizontal select-group" ng-submit="action.search()">
                        <select class="form-control  margin-bottom-5" name="cg" ng-model="paramsUrl.cg">
                            <option value="">Loại nhà đất ...</option>
                            <option ng-repeat="item in paramsSearch.category" value="@{{item.id}}">
                                @{{item.name}}
                            </option>
                        </select>
                        <input type="text" name="ad" ng-model="paramsUrl.ad" class="form-control margin-bottom-5" placeholder="Địa chỉ"/>
                        <div class="form-inline margin-bottom-5">
                            <input type="text" ng-model="paramsUrl.pmi" name="pmi" class="form-control" placeholder="Giá từ"/>
                            <input type="text" ng-model="paramsUrl.pma" name="pma" class="form-control" placeholder="Đến"/>
                        </div>
                        <div class="box-search-right-action">
                            <button class="btn btn-success btn-search width-100" type="submit">Tìm kiếm</button>
                            <!--<button class="btn btn-success btn-search-more">Tìm kiếm thêm</button>-->
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="title-border">
                    Quảng cáo
                    <button class="borber-radius-bottom"></button>
                </div>
            </div>
            <widget position-code="positionCode" widget-data="widgetData"></widget>
<!--            <div class="col-md-12 col-sm-6 col-xs-6">
                <aside>
                    <div class="margin-bottom-15 content-right-img">
                        <img src="{{url('frontend')}}/images/article-right1.png" class="img-responsive" alt=""/>
                    </div>
                </aside>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-6">
                <aside>
                    <div class="margin-bottom-15 content-right-img">
                        <img src="{{url('frontend')}}/images/article-right1.png" class="img-responsive" alt=""/>
                    </div>
                </aside>
            </div>-->
        </div>
    </div>
</div><!--.end content-left-->