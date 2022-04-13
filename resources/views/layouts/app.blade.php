<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>BroaddCast Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="public/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="public/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="public/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    @yield('styles')

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{ route('home') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="public/assets/images/mob_logo.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="public/assets/images/logo.png" alt="" height="19">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="bx bx-bell bx-tada"></i>
                            @if (auth()->user()->unreadNotifications->count() > 0)
                                <span
                                    class="badge bg-danger rounded-pill">{{ auth()->user()->unreadNotifications->count() }}
                                </span>
                            @endif
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ route('markAsRead') }}" class="small" key="t-view-all">
                                            Mark as read</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                @if (auth()->user()->unreadNotifications->count() > 0)
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                        <a href="javascript: void(0);" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1" key="t-your-order">
                                                        {{ $notification->data['data'] }} lead is received</h6>
                                                    <div class="font-size-12 text-muted">
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i>
                                                            <span
                                                                key="t-min-ago">{{ $notification->created_at->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                @else
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1 text-center" key="t-your-order"> No new notifications
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                @endif

                            </div>
                            <div class="p-2 border-top d-grid"></div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="public/assets/images/users/avatar-1.jpg"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                                <span key="t-profile">Profile</span></a>

                            <a class="dropdown-item d-block" href="#">
                                <i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span
                                    key="t-settings">Settings</span></a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                                <span key="t-logout">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu">Menu</li>

                        <li>
                            <a href="{{ route('home') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-dashboards">Dashboard</span>
                            </a>
                        </li>


                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="bx bx-calendar"></i>
                                <span key="t-dashboards">Calendar</span>
                            </a>
                        </li>


                        <li class="menu-title" key="t-apps">Apps</li>



                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-store"></i>
                                <span key="t-nexa">Nexa</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('popup.index') }}">Pop Up</a></li>
                                <li><a href="{{ route('enquiry.index') }}">Car Enquiry</a></li>
                                <li><a href="{{ route('on-road-price.index') }}">On Road Price</a></li>
                                <li><a href="{{ route('insurance.index') }}">Insurance</a></li>
                                <li><a href="{{ route('finance.index') }}">Finance</a></li>
                                <li><a href="{{ route('book-a-service.index') }}">Book A Service</a></li>
                                <li><a href="{{ route('contact-us.index') }}">Contact Us</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        @yield('content')
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="public/assets/libs/jquery/jquery.min.js"></script>
    <script src="public/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="public/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="public/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="public/assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <script src="public/assets/libs/apexcharts/apexcharts.min.js"></script>

    <script src="public/assets/js/app.js"></script>


    @yield('script');
</body>

</html>
