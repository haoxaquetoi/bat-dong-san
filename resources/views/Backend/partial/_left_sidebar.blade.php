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
        <li class="{{ ($current_route_name == 'category') ? 'active' : '' }}">
            <a href="{{route('category')}}">
                <i class="fa fa-user-circle"></i> <span>Chuyên mục</span>
            </a>
        </li>
        <li class="{{ ($current_route_name == 'article') ? 'active' : '' }}">
            <a href="{{route('article')}}">
                <i class="fa fa-user-circle"></i> <span>Tin bài</span>
            </a>
        </li>
        
        <li class="{{ (in_array($current_route_name,['feedback','settingFeedback'])) ? 'active' : '' }}">
            <a href="javascript:void(0)">
                <i class="fa fa-question-circle-o" aria-hidden="true"></i> <span>Góp ý</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($current_route_name == 'feedback') ? 'active' : '' }}">
                    <a href="{{route('feedback')}}">
                        <i class="fa fa-user-circle"></i> <span>Danh sách góp ý</span>
                    </a>
                </li>
                <li class="{{ ($current_route_name == 'settingFeedback') ? 'active' : '' }}">
                    <a href="{{route('settingFeedback')}}">
                        <i class="fa fa-user-circle"></i> <span>Cấu hình câu hỏi góp ý</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="{{ ($current_route_name == 'user') ? 'active' : '' }}">
            <a href="{{route('user')}}">
                <i class="fa fa-user-circle"></i> <span>Người dùng</span>
            </a>
        </li>
        <li class="{{ ($current_route_name == 'group') ? 'active' : '' }}">
            <a href="{{route('group')}}">
                <i class="fa fa-group"></i> <span>Nhóm</span>
            </a>
        </li>
        
        
        <li class="{{ ($current_route_name == 'menu') ? 'active' : '' }}">
            <a href="{{route('menu')}}">
                <i class="fa fa-list"></i> <span>Menu</span>
            </a>
        </li>
        <li class="{{ ($current_route_name == 'widget') ? 'active' : '' }}">
            <a href="{{route('widget')}}">
                <i class="fa fa-list"></i> <span>widget</span>
            </a>
        </li>
        <li class="{{ ($current_route_name == 'advertising') ? 'active' : '' }}">
            <a href="{{route('advertising')}}">
                <i class="fa fa-user-circle"></i> <span>Quảng cáo</span>
            </a>
        </li>

        
        <li class="{{ (in_array($current_route_name,['city','district','village','street'])) ? 'active' : '' }}">
            <a href="javascript:void(0)">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>Quản lý địa chỉ</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($current_route_name == 'city') ? 'active' : '' }}">
                    <a href="{{route('city')}}">
                        <i class="fa fa-image"></i> <span>Tỉnh/Thành phố</span>
                    </a>
                </li>
                <li class="{{ ($current_route_name == 'district') ? 'active' : '' }}">
                    <a href="{{route('district')}}">
                        <i class="fa fa-image"></i> <span>Quận/Huyện</span>
                    </a>
                </li>
                <li class="{{ ($current_route_name == 'village') ? 'active' : '' }}">
                    <a href="{{route('village')}}">
                        <i class="fa fa-image"></i> <span>Phường/Xã</span>
                    </a>
                </li>
                <li class="{{ ($current_route_name == 'street') ? 'active' : '' }}">
                    <a href="{{route('street')}}">
                        <i class="fa fa-image"></i> <span>Đường phố</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="{{ ($current_route_name == 'file-manager') ? 'active' : '' }}">
            <a href="javascript:void(0)">
                <i class="fa fa-folder-o"></i>
                <span>Media</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{URL::asset('')}}file-manager?type=Images" target="_blank">
                        <i class="fa fa-image"></i> <span>Media-images</span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::asset('')}}file-manager?type=Files" target="_blank">
                        <i class="fa fa-file"></i> <span>Media-files</span>
                    </a>
                </li>
            </ul>
        </li>
         <li  class="{{ ($current_route_name == 'setting') ? 'active' : '' }}">
            <a href="{{route('setting')}}">
                <i class="fa fa-cog"></i> <span>Cài đặt</span>
            </a>
        </li>

    </ul>
</section>
<!-- /.sidebar -->