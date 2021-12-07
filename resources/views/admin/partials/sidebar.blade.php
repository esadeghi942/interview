<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
<!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#">{{ Auth::user()->name }}</a>
                    <a href="{{route('logout')}}" class="logout"><i class="fa fa-power-off"></i></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('admin')}}" class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>میز کار</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-address-card-o"></i>
                            <p>
                                کاربران
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.user.index')}}" class="nav-link">
                                    <i class="nav-icon fa fa-circle-o"></i>
                                    <p class="text">لیست کاربران</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.user.create')}}" class="nav-link">
                                    <i class="nav-icon fa fa-circle-o"></i>
                                    <p class="text">ثبت کاربر جدید</p>
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
