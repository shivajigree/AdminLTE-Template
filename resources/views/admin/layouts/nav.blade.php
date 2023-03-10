<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item nav-link "><h5>Admin Panel - Ecommerce(v.{{env('APP_VERSION')}})</h5></li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        {{--        <li class="nav-item dropdown">--}}
        {{--            <a class="nav-link" data-toggle="dropdown" href="#">--}}
        {{--                <i class="far fa-bell"></i>--}}
        {{--                <span class="badge badge-warning navbar-badge">15</span>--}}
        {{--            </a>--}}
        {{--            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
        {{--                <span class="dropdown-header">15 Notifications</span>--}}
        {{--                <div class="dropdown-divider"></div>--}}
        {{--                <a href="#" class="dropdown-item">--}}
        {{--                    <i class="fas fa-envelope mr-2"></i> 4 new messages--}}
        {{--                    <span class="float-right text-muted text-sm">3 mins</span>--}}
        {{--                </a>--}}
        {{--                <div class="dropdown-divider"></div>--}}
        {{--                <a href="#" class="dropdown-item">--}}
        {{--                    <i class="fas fa-users mr-2"></i> 8 friend requests--}}
        {{--                    <span class="float-right text-muted text-sm">12 hours</span>--}}
        {{--                </a>--}}
        {{--                <div class="dropdown-divider"></div>--}}
        {{--                <a href="#" class="dropdown-item">--}}
        {{--                    <i class="fas fa-file mr-2"></i> 3 new reports--}}
        {{--                    <span class="float-right text-muted text-sm">2 days</span>--}}
        {{--                </a>--}}
        {{--                <div class="dropdown-divider"></div>--}}
        {{--                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
        {{--            </div>--}}
        {{--        </li>--}}
        <!-- User Account Menu -->
        <li class="nav-item dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="nav-link " data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{ asset("images/admin.png") }}" class="user-image" alt="User Image"/>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{auth()->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                    <img src="{{ asset("images/admin.png") }}" class="img-circle" alt="User Image"/>
                    <p>
                        {{auth()->user()->name}}
                        <small>Member since {{date('F j, Y ', strtotime(auth()->user()->created_at))}}</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="float-right">
                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
