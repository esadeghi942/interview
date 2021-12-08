<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   {{-- <a href="index3.html" class="brand-link">
        <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>--}}

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" >{{ Auth::user()->name .'  '}}</a>
                    <a href="{{route('logout')}}" class="logout"><i class="fa fa-power-off"></i></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('index')}}" class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>میز کار</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-calendar-check-o"></i>
                            <p>ساعت کاری
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('user.worktimes.create')}}" class="nav-link">
                                    <i class="nav-icon fa fa-circle-o"></i>
                                    <p>ثبت ساعت کاری</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('user.worktimes.index')}}" class="nav-link">
                                    <i class="nav-icon fa fa-circle-o"></i>
                                    <p>ساعات کاری هفته جاری</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
