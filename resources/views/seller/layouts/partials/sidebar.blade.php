<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('sellers.dashboard')}}" class="brand-link">
        <img src="{{ asset('dashboard-assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text text-white">{{__('Seller.sidebar.title')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dashboard-assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('seller')->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 sidebar">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('seller.sidebar.products')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('sellers.products.index')}}" class="nav-link button active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('seller.sidebar.all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sellers.products.create')}}" class="nav-link button">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('seller.sidebar.create')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon zmdi zmdi-leak"></i>
                        <p>
                            {{__('seller.sidebar.coupons')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('sellers.coupons.index')}}" class="nav-link button active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('seller.sidebar.all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sellers.coupons.create')}}" class="nav-link button">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('seller.sidebar.create')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
