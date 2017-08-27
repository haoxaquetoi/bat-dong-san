<?php
$request = new Illuminate\Http\Request;
?>
@extends('backend.layouts.default')
@section('title', 'Thư viện media')
@section('content')
<?php
$SettingCrawler = app('SettingCrawler')->getColumnConfig();
?>
<section class="content-header">
    <h1>
        Cấu hình crawler
    </h1>
</section>
<section class="content">
    <form role="form" action="{{url('/admin/crawler/updateCrawler')}}" method="POST">
        {{ csrf_field()}}
        <input type="hidden" name="websiteCode" value="{{$websiteCode}}" />
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin website lấy tin</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <label>Tên website:</label>&nbsp;&nbsp;<?php echo $crawlerInfo['name'] ?>
                        <br/>
                        <label>Đường dẫn truy cập:</label>&nbsp;&nbsp;<?php echo $crawlerInfo['url'] ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cấu hình chuyên mục</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group" >
                            <label for="">Chọn chuyên mục lấy tin <span class="text-danger">*</span></label>
                            <select class="form-control" name="selCategoryID" onchange="window.location.href ='{{url("/admin/crawler/configCrawler/$websiteCode")}}' +'/' + this.value" >
                                <option value="0">--Chọn chuyên mục--</option>
                                <?php
                                for ($i = 0; $i < count($category); $i ++) {
                                    $name = $category[$i]['name'];
                                    $catID = $category[$i]['id'];
                                    $splitChild = $category[$i]['children'];
                                    $selected = (isset(request()->catID) && request()->catID == $catID) ? 'selected' : '';
                                    echo "<option $selected value='$catID' >{$splitChild}{$name}</option>";
                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group" >
                            <label>
                                Xpath lọc danh sách tin<span class="text-danger">*</span>
                            </label> 
                            <input value="{{isset($config->value['txtUrlCat']) ? $config->value['txtUrlCat'] : ''}}"  placeholder="Đường dẫn"   type="text" class="form-control" id="txtCatSlug"  name="txtUrlCat" />
                        </div>
                        <div class="form-group" >
                            <label for="txtCatXpath">Xpath lấy chi tiết tin<span class="text-danger">*</span></label>
                            <input value="{{isset($config->value['xpathDetailPost']) ?  $config->value['xpathDetailPost'] : ''}}" placeholder="Đường dẫn" type="text" class="form-control" id="txtCatXpath"  name="xpathDetailPost" />
                        </div>
                    </div>

                </div>


                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin cơ bản</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php
                        foreach ($SettingCrawler['base'] as $key => $name) {
                            $val = isset($config->value['base'][$key]) ? $config->value['base'][$key] : '';
                            echo "<div class='form-group'>
                                            <label for='txt{$key}'>$name<span class='text-danger'>*</span></label>
                                                    <input value='$val'  placeholder='Xpath $name'  type='text' class='form-control' id='{$key}' name='{$key}' />
                                    </div>";
                        }
                        ?>
                    </div>

                </div>

                <div class="box box-primary">   

                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin liên hệ</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php
                        foreach ($SettingCrawler['contact'] as $key => $name) {
                            $val = isset($config->value['contact'][$key]) ? $config->value['contact'][$key] : '';
                            echo "<div class='form-group'>
                                            <label for='txt{$key}'>$name<span class='text-danger'>*</span></label>
                                                    <input value='{$val}'  placeholder='Xpath $name'  type='text' class='form-control' id='{$key}' name='{$key}' />
                                    </div>";
                        }
                        ?>
                    </div>
                </div>


            </div>
            <div class="col-md-6">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Chi tiết tin đăng</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <?php
                        foreach ($SettingCrawler['content'] as $key => $name) {
                            $val = isset($config->value['content'][$key]) ? $config->value['content'][$key] : '';
                            echo "<div class='form-group' >
                                            <label for='txt{$key}'>$name<span class='text-danger'>*</span></label>
                                                    <input value='{$val}' placeholder='Xpath $name'  type='text' class='form-control' id='{$key}' name='{$key}' />
                                    </div>";
                        }
                        ?>
                    </div>
                </div>

                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin khác</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php
                        foreach ($SettingCrawler['other'] as $key => $name) {
                            $val = isset($config->value['other'][$key]) ? $config->value['other'][$key] : '';
                            echo "<div class='form-group' >
                                            <label for='txt{$key}'>$name<span class='text-danger'>*</span></label>
                                                    <input value='{$val}' placeholder='Xpath $name'  type='text' class='form-control' id='{$key}' name='{$key}' />
                                    </div>";
                        }
                        ?>
                    </div>
                </div>

                <div class="box box-primary">    

                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách ảnh/video slide</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php
                        foreach ($SettingCrawler['slide'] as $key => $name) {
                            $val = isset($config->value['slide'][$key]) ? $config->value['slide'][$key] : '';
                            echo "<div class='form-group'>
                                            <label for='txt{$key}'>$name<span class='text-danger'>*</span></label>
                                                    <input value='$val' placeholder='Xpath $name'  type='text' class='form-control' id='{$key}' name='{$key}' />
                                    </div>";
                        }
                        ?>
                    </div>

                </div>

            </div>
            <!-- /.row (main row) -->

            <center>
                <button type="submit" class="btn btn-primary" >Lưu</button>
            </center>
        </div>
    </form>
</section>
<!-- /.content -->
@endsection











