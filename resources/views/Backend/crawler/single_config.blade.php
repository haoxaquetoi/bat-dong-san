@extends('backend.layouts.default')
@section('title', 'Thư viện media')
@section('content')

@push('scripts')
<script src="{{url('backend')}}/js/crawler/crawlerCtrl.js"></script>
<script src="{{url('backend')}}/js/factory/services/crawlerService.js"></script>
@endpush
<?php
$SettingCrawler = app('SettingCrawler')->getColumnConfig();
?>
<angular ng-cloak="">

    <section class="content-header">
        <h1>
            Cấu hình crawler
        </h1>

    </section>
    <section class="content">
        <form role="form">
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
                            <label for="txtSlug">Tên website:</label>&nbsp;&nbsp;<?php echo $crawlerInfo->website_name ?>
                            <br/>
                            <label for="txtSlug">Đường dẫn truy cập:</label>&nbsp;&nbsp;<?php echo $crawlerInfo->website_url ?>
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
                            <div class="form-group" ng-class="actions.hasError('title') ? 'has-error' : ''">
                                <label for="txtTitle">Chọn chuyên mục lấy tin <span class="text-danger">*</span></label>
                                <select class="form-control">
                                    <?php
                                    for ($i = 0; $i < count($category); $i ++) {
                                        $name = $category[$i]['name'];
                                        $catID = $category[$i]['id'];
                                        $splitChild = $category[$i]['children'];
                                        echo "<option value='$catID'>{$splitChild}{$name}</option>";
                                    }
                                    ?>

                                </select>
                                <span class="help-block">@{{actions.showError('title')}}</span>
                            </div>

                            <div class="form-group" ng-class="actions.hasError('slug') ? 'has-error' : ''">
                                <label for="txtSlug">Xpath lọc danh sách tin<span class="text-danger">*</span></label>
                                <input placeholder="Đường dẫn"  ng-model="articleInfo.slug"  type="text" class="form-control" id="txtSlug"  name="txtSlug" />
                                <span class="help-block">@{{actions.showError('slug')}}</span>
                            </div>

                            <div class="form-group" ng-class="actions.hasError('content') ? 'has-error' : ''">
                                <label for="txtCatXpath">Xpath lấy chi tiết tin<span class="text-danger">*</span></label>
                                <input placeholder="Đường dẫn"  ng-model="articleInfo.txtContent"  type="text" class="form-control" id="txtContent"  name="txtContent" />
                                <span class="help-block">@{{actions.showError('content')}}</span>
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
                                echo "<div class='form-group' ng-class='actions.hasError('$key') ? 'has-error' : '''>
                                            <label for='txt{$key}'>$name<span class='text-danger'>*</span></label>
                                                    <input placeholder='Xpath $name' ng-model='crawlerConfig.$key' type='text' class='form-control' id='txt{$key}' name='txt{$key}' />
                                            <span class='help-block'>{{actions.showError('$key')}}</span>
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
                                echo "<div class='form-group' ng-class='actions.hasError('$key') ? 'has-error' : '''>
                                            <label for='txt{$key}'>$name<span class='text-danger'>*</span></label>
                                                    <input placeholder='Xpath $name' ng-model='crawlerConfig.$key' type='text' class='form-control' id='txt{$key}' name='txt{$key}' />
                                            <span class='help-block'>{{actions.showError('$key')}}</span>
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
                                echo "<div class='form-group' ng-class='actions.hasError('$key') ? 'has-error' : '''>
                                            <label for='txt{$key}'>$name<span class='text-danger'>*</span></label>
                                                    <input placeholder='Xpath $name' ng-model='crawlerConfig.$key' type='text' class='form-control' id='txt{$key}' name='txt{$key}' />
                                            <span class='help-block'>{{actions.showError('$key')}}</span>
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
                                echo "<div class='form-group' ng-class='actions.hasError('$key') ? 'has-error' : '''>
                                            <label for='txt{$key}'>$name<span class='text-danger'>*</span></label>
                                                    <input placeholder='Xpath $name' ng-model='crawlerConfig.$key' type='text' class='form-control' id='txt{$key}' name='txt{$key}' />
                                            <span class='help-block'>{{actions.showError('$key')}}</span>
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
                                echo "<div class='form-group' ng-class='actions.hasError('$key') ? 'has-error' : '''>
                                            <label for='txt{$key}'>$name<span class='text-danger'>*</span></label>
                                                    <input placeholder='Xpath $name' ng-model='crawlerConfig.$key' type='text' class='form-control' id='txt{$key}' name='txt{$key}' />
                                            <span class='help-block'>{{actions.showError('$key')}}</span>
                                    </div>";
                            }
                            ?>
                        </div>

                    </div>

                </div>
                <!-- /.row (main row) -->
        </form>
    </section>
    <!-- /.content -->
    @include('backend.crawler.modalSingleCrawler')
</angular>
@endsection











