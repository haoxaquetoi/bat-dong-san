<!--.content-right-->
<div class="col-md-3 col-sm-12  col-xs-12 content-right">
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
                            <select class="form-control" name="cg">
                                <option value="">Loại nhà đất ...</option>
                                @foreach ($dataView['paramsSearch']['category'] as $category) 
                                <option value='{{$category->id}}' {{($category->id == old ( 'cg' ) ? 'selected' : '')}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 padding-bottom-15">
                            <select class="form-control" name="ct">
                                <option value="">Thành phố ...</option>
                                @foreach ($dataView['paramsSearch']['city'] as $city) 
                                <option value='{{$city->id}}' {{($city->id == old ( 'ct' ) ? 'selected' : '')}}>{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 padding-bottom-15">
                            <select class="form-control" name="dt">
                                <option value="">Quận, huyện ...</option>
                                @foreach ($dataView['paramsSearch']['district'] as $values) 
                                <option value='{{$values->id}}' {{($values->id == old ( 'dt' ) ? 'selected' : '')}}>{{$values->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 padding-bottom-15">
                            <select class="form-control" name="vil">
                                <option value="">Phường, xã ...</option>
                                @foreach ($dataView['paramsSearch']['village'] as $values) 
                                <option value='{{$values->id}}' {{($values->id == old ( 'vil' ) ? 'selected' : '')}}>{{$values->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 padding-bottom-15">
                            <select class="form-control" name="vil">
                                <option value="">Đường ...</option>
                                @foreach ($dataView['paramsSearch']['street'] as $values) 
                                <option value='{{$values->id}}' {{($values->id == old ( 'st' ) ? 'selected' : '')}}>{{$values->name}}</option>
                                @endforeach
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
                        @for($i = 0 ;$i < count($dataView['paramsSearch']['priceMin']); $i ++)
                        <div class="col-md-6 col-sm-12 col-xs-12 padding-bottom-15">
                            <input id="checkbox-3" type="radio" name='pmia' value="" class="magic-radio" checked="">
                            <label for="checkbox-3" class="padding-right-20">
                                Dưới 1 tỷ
                            </label>
                        </div>
                        @endfor
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
                        @foreach ($dataView['paramsSearch']['direction'] as $directionCode => $direction) 
                        <div class="col-md-6 col-sm-12 col-xs-12 padding-bottom-15">
                            <input id="dh-{{$directionCode}}" type="radio" name='dh' value="{{$directionCode}}" class="magic-radio"  {{($directionCode == old ( 'dh' ) ? 'checked' : '')}}>
                                   <label for="dh-{{$directionCode}}" class="padding-right-20">
                                {{$direction}}
                            </label>
                        </div>
                        @endforeach
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
                    <input type="text" class="form-control text-center margin-bottom-15" value="50m2" />
                    <label class="control-label">Diện tích lớn nhất</label>
                    <input type="text" class="form-control text-center margin-bottom-15" value="200m2" />
                </form>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12 padding-bottom-45">
                <div class="title-border">
                    Chọn số tầng, Số phòng
                    <button class="borber-radius-bottom"></button>
                </div>
                <form class="form-horizontal select-group">
                    <label class="control-label">Số tầng</label>
                    <select class="form-control" name="sn">
                        <option value="">Số tầng ...</option>
                        @foreach ($dataView['paramsSearch']['storeysNumber'] as $values) 
                        <option value='{{$values->number_of_storeys}}'  {{($values->number_of_storeys == old ( 'sn' ) ? 'selected' : '')}}>{{$values->number_of_storeys}}</option>
                        @endforeach
                    </select>
                    <label class="control-label">Số phòng</label>
                    <select class="form-control" name="rn">
                        <option value="">Số phòng ...</option>
                        @foreach ($dataView['paramsSearch']['roomNumber'] as $values) 
                        <option value='{{$values->number_of_bedrooms}}'  {{($values->number_of_bedrooms == old ( 'rn' ) ? 'selected' : '')}}>{{$values->number_of_bedrooms}}</option>
                        @endforeach
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