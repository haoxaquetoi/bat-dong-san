<!--.content-right-->
<script src="{{url('Frontend')}}/js/ctrl/rightSidebarSearch.js"></script>
<div class="col-md-3 col-sm-12  col-xs-12 content-right" ng-controller="rightSidebarSearch">
    <div class="row content-right-single-page">
        <div class="row">
            <!--            <div class="col-md-12 col-sm-6 col-xs-12 padding-bottom-45">
                            <div class="title-border">
                                Chế độ hiển thị
                                <button class="borber-radius-bottom"></button>
                            </div>
                            <form class="form-horizontal form-magic">
                                <div class="form-magic padding-bottom-5">
                                    <input id="checkbox-0" type="checkbox" name="rdRating" class="magic-checkbox" checked="">
                                    <label for="checkbox-0" class="padding-right-20">
                                        Hiển thị tin đảm bảo
                                    </label>
                                </div>
                                <div class="form-magic">
                                    <input id="checkbox-1" type="checkbox" name="rdRating" class="magic-checkbox" value="386">
                                    <label for="checkbox-1" class="padding-right-20">
                                        Hiển thị tin thường
                                    </label>
                                </div>
                            </form>
                        </div>-->
            <div class="col-md-12 col-sm-6 col-xs-12 padding-bottom-45">
                <div class="title-border">
                    Chọn địa điểm
                    <button class="borber-radius-bottom"></button>
                </div>
                <form class="form-horizontal select-group">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 padding-bottom-15">
                            <select class="form-control" name="cg" ng-model="paramsUrl.cg" ng-change="action.search()">
                                <option value="">Loại nhà đất ...</option>
                                <option ng-repeat="item in paramsSearch.category" value="@{{item.id}}">
                                    @{{item.name}}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 padding-bottom-15">
                            <select class="form-control" name="ct" ng-model="paramsUrl.ct" ng-change="action.search()">
                                <option value="">Thành phố ...</option>
                                <option ng-repeat="item in paramsSearch.city" value="@{{item.id}}">
                                    @{{item.name}}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 padding-bottom-15">
                            <select class="form-control" name="dt" ng-model="paramsUrl.dt" ng-change="action.search()">
                                <option value="">Quận, huyện ...</option>
                                <option ng-repeat="item in paramsSearch.district" value="@{{item.id}}" ng-show="(paramsUrl.ct == item.city_id)">
                                    @{{item.name}}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 padding-bottom-15">
                            <select class="form-control" name="vil" ng-model="paramsUrl.vil" ng-change="action.search()">
                                <option value="">Phường, xã ...</option>
                                <option ng-repeat="item in paramsSearch.village" value="@{{item.id}}" ng-show="(paramsUrl.dt == item.district_id)">
                                    @{{item.name}}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 padding-bottom-15">
                            <select class="form-control" name="st" ng-model="paramsUrl.st" ng-change="action.search()"> 
                                <option value="">Đường ...</option>
                                <option ng-repeat="item in paramsSearch.street" value="@{{item.id}}" ng-show="(paramsUrl.vil == item.village_id)">
                                    @{{item.name}}
                                </option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12 padding-bottom-45">
                <div class="title-border">
                    Chọn mức giá
                    <button class="borber-radius-bottom"></button>
                </div>
                <form class="form-horizontal form-magic">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-xs-12" >
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 padding-bottom-15">
                                    <label class=" padding-left-15 bold">Giá từ</label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 padding-bottom-15">
                                    <input id="0-pmi" type="radio" name='pmi' value="" class="magic-radio" ng-model="paramsUrl.pmi" ng-change="action.search()">
                                    <label for="0-pmi" class="padding-right-20">
                                        Tất cả
                                    </label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 padding-bottom-15" ng-repeat="(key, value) in paramsSearch.priceMin">
                                    <input id="@{{key}}-pmi" type="radio" name='pmi' value="@{{key}}" ng-disabled="(1 * key > 1 * paramsUrl.pma && paramsUrl.pma)" class="magic-radio" ng-model="paramsUrl.pmi" ng-change="action.search()">
                                    <label for="@{{key}}-pmi" class="padding-right-20">
                                        @{{value}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-xs-12" >
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 padding-bottom-15">
                                    <label class=" padding-left-15 bold">Đến</label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 padding-bottom-15">
                                    <input id="0-pma" type="radio" name='pma' value="" class="magic-radio" ng-model="paramsUrl.pma" ng-change="action.search()">
                                    <label for="0-pma" class="padding-right-20">
                                        Tất cả
                                    </label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 padding-bottom-15" ng-repeat="(key, value) in paramsSearch.priceMax">
                                    <input id="@{{key}}-pma" type="radio" name='pma' value="@{{key}}" ng-disabled="(1 * key < 1 * paramsUrl.pmi)" class="magic-radio" ng-model="paramsUrl.pma" ng-change="action.search()">
                                    <label for="@{{key}}-pma" class="padding-right-20">
                                        @{{value}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12 padding-bottom-45 Directional">
                <div class="title-border">
                    Chọn hướng nhà
                    <button class="borber-radius-bottom"></button>
                </div>
                <form class="form-horizontal form-magic">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 padding-bottom-15">
                            <input id="0-dh" type="radio" name='dh' value="" class="magic-radio" ng-model="paramsUrl.dh" ng-change="action.search()">
                            <label for="0-dh" class="padding-right-20">
                                Tất cả
                            </label>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 padding-bottom-15" ng-repeat="(key, value) in paramsSearch.direction">
                            <input id="@{{key}}-dh" type="radio" name='dh' value="@{{key}}" class="magic-radio" ng-model="paramsUrl.dh" ng-change="action.search()">
                            <label for="@{{key}}-dh" class="padding-right-20">
                                @{{value}}
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12 padding-bottom-45">
                <div class="title-border">
                    Chọn diện tích
                    <button class="borber-radius-bottom"></button>
                </div>
                <form class="form-horizontal">
                    <label class="control-label">Diện tích nhỏ nhất</label>
                    <input type="number" ng-model="paramsUrl.fami" class="form-control text-center margin-bottom-15"
                           ng-enter="action.search()" placeholder="Diện tích nhỏ nhất"/>
                    <label class="control-label">Diện tích lớn nhất</label>
                    <input type="number"  ng-model="paramsUrl.fama" class="form-control text-center margin-bottom-15"
                           ng-enter="action.search()" placeholder="Diện tích lớn nhất" />
                </form>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12 padding-bottom-45">
                <div class="title-border">
                    Chọn số tầng, Số phòng
                    <button class="borber-radius-bottom"></button>
                </div>
                <form class="form-horizontal select-group">
                    <label class="control-label">Số tầng</label>
                    <select class="form-control" name="sn" ng-model="paramsUrl.sn" ng-change="action.search()">
                        <option value="">Số tầng ...</option>
                        <option ng-repeat="item in paramsSearch.storeysNumber" value="@{{item.number_of_storeys}}">
                            @{{item.number_of_storeys}}
                        </option>
                    </select>
                    <label class="control-label">Số phòng</label>
                    <select class="form-control" name="rn" ng-model="paramsUrl.rn" ng-change="action.search()">
                        <option value="">Số phòng ...</option>
                        <option ng-repeat="item in paramsSearch.roomNumber" value="@{{item.number_of_bedrooms}}">
                            @{{item.number_of_bedrooms}}
                        </option>
                    </select>
                </form>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="title-border">
                    Quảng cáo
                    <button class="borber-radius-bottom"></button>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-6">
                <aside>
                    <div class="margin-bottom-15 content-right-img">
                        <img src="{{url('Frontend')}}/images/article-right1.png" class="img-responsive" alt=""/>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div><!--.end content-right-->