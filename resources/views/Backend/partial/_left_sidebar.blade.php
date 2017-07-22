<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{url('AdminLTE')}}/dist/img/defaulUser.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>
            <a href="#"><i>{{Auth::user()->email}}</i> </a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li>
            <a href="{{route('user')}}">
                <i class="fa fa-user-circle"></i> <span>Người dùng</span>
            </a>
        </li>
        <li>
            <a href="{{route('group')}}">
                <i class="fa fa-group"></i> <span>Nhóm</span>
            </a>
        </li>
        <li>
            <a href="{{route('category')}}">
                <i class="fa fa-user-circle"></i> <span>Chuyên mục</span>
            </a>
        </li>
        <li>
            <a href="{{route('crawler')}}">
                <i class="fa fa-user-circle"></i> <span>Crawler</span>
            </a>
        </li>
        <li>
            <a href="{{route('advertising')}}">
                <i class="fa fa-user-circle"></i> <span>Quảng cáo</span>
            </a>
        </li>
        <li>
            <a href="{{route('article')}}">
                <i class="fa fa-user-circle"></i> <span>Tin bài</span>
            </a>
        </li>
        <li>
            <a href="{{route('feedback')}}">
                <i class="fa fa-user-circle"></i> <span>Danh sách góp ý</span>
            </a>
        </li>
        <li>
            <a href="{{route('settingFeedback')}}">
                <i class="fa fa-user-circle"></i> <span>Cấu hình câu hỏi góp ý</span>
            </a>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fa fa-folder-o"></i>
                <span>Media</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{URL::asset('')}}file-manager?type=image" target="_blank">
                        <i class="fa fa-image"></i> <span>Media-images</span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::asset('')}}file-manager?type=image" target="_blank">
                        <i class="fa fa-file"></i> <span>Media-files</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="fa fa-cog"></i> <span>Cài đặt</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{route('setting')}}">
                        <i class="fa fa-info-circle"></i> <span>Thông tin chung</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('setting')}}#!/email">
                        <i class="fa fa-envelope"></i> <span>Email</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</section>
<!-- /.sidebar -->