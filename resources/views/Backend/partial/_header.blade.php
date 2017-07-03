<!-- Logo -->
<a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>C</b>R</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Co</b>res</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="javascript:void(0)" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{url('AdminLTE')}}/dist/img/defaulUser.jpg" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{Auth::user()->name}}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{url('AdminLTE')}}/dist/img/defaulUser.jpg" class="img-circle" alt="User Image">

                        <p>
                            {{Auth::user()->name}} {{!empty(Auth::user()->job_title)?"- " . Auth::user()->job_title: ""}}
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="#" data-toggle="modal" data-target="#changeUserInfoModal" class="btn btn-default btn-flat">Thông tin cá nhân</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{route('doLogout')}}" class="btn btn-default btn-flat">Đăng xuất</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>