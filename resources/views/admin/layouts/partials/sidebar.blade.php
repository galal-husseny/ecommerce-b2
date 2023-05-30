<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dashboard-assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
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
                <li class="nav-item ">
                    <a href="#" @class([
                        'nav-link',
                        'active' => false,
                        'color-white'
                    ])>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('admin.sidebar.categories.categories')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admins.categories.index')}}" class="nav-link button ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.sidebar.categories.all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admins.categories.create')}}" class="nav-link button">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.sidebar.categories.create')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('admin.sidebar.cities.cities')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admins.cities.index')}}" class="nav-link button ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.sidebar.cities.all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admins.cities.create')}}" class="nav-link button">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.sidebar.cities.create')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('admin.sidebar.regions.regions')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admins.regions.index')}}" class="nav-link button ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.sidebar.regions.all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admins.regions.create')}}" class="nav-link button">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.sidebar.regions.create')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('admin.sidebar.specs.specs')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admins.specs.index')}}" class="nav-link button ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.sidebar.specs.all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admins.specs.create')}}" class="nav-link button">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.sidebar.specs.create')}}</p>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('admin.sidebar.users.users')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admins.users.index')}}" class="nav-link button ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.sidebar.users.all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admins.users.create')}}" class="nav-link button">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.sidebar.users.create')}}</p>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('admin.sidebar.addresses.addresses')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admins.addresses.index')}}" class="nav-link button ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.sidebar.users.all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admins.addresses.create')}}" class="nav-link button">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.sidebar.users.create')}}</p>
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

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.nav-link').click(function () {
                $(this).toggleClass('active')
            })
        })
    </script>
@endpush
