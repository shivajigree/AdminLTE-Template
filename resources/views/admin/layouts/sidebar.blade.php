<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{asset('bower_components/admin-lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8;-ms-transform: rotate(270deg); /* IE 9 */
  transform: rotate(270deg);">
        <span class="brand-text font-weight-light">Pariwartan Ecommerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('admin') }}"
                       class="nav-link {{ Request::url() == url('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('getHomeSlider') }}"
                       class="nav-link {{ (request()->segment(1) == 'getHomeSlider') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-photo-video"></i>
                        Home Sliders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('getGallery') }}"
                       class="nav-link {{ request()->is('getGallery*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-image"></i>
                        Gallery
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('getProduct') }}"
                       class="nav-link {{ request()->is('getProduct*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a href=""
                       class="nav-link">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        Wholesale
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('getOrder') }}"
                       class="nav-link {{ request()->is('getOrder*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('getReport') }}"
                       class="nav-link {{ request()->is('getReport*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-charging-station"></i>
                        Reports
                    </a>
                </li>

                <li class="nav-header">
                    Site Manager <span class="right badge badge-danger float-right">&#128504;</span>
                </li>
                <li class="nav-item">
                    <a href="{{ url('getAbout') }}"
                       class="nav-link {{ request()->is('getAbout*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('getSiteIdentity') }}"
                       class="nav-link {{ request()->is('getSiteIdentity') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        Site Identity
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('getGeneralSetting') }}"
                       class="nav-link {{ request()->is('getGeneralSetting') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-life-ring"></i>
                        General Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('getSEO') }}"
                       class="nav-link {{ request()->is('getSEO') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-globe"></i>
                        SEO Manager
                    </a>
                </li>
                <li class="nav-header">
                    Extra <span class="right badge badge-danger float-right">&#128504;</span>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system-info') }}"
                       class="nav-link {{ request()->is('system-info') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-server"></i>
                        System Information
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('optimize') }}"
                       class="nav-link {{ request()->is('optimize') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        Cache Settings
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
