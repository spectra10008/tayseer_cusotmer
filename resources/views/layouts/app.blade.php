<!doctype html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="utf-8" />
    <title>تيسير - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Tayseer , Landing Platform" name="description" />
    <meta content="Tjoint" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/assets/images/small_logo.png') }}">

    <!-- plugin css -->
    <link href="{{ asset('/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('/assets/css/preloader-rtl.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('/assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('/assets/css/app-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
        /* .form-floating-custom>label {
                right: 48px;
            } */

        body {
            font-family: 'Almarai', sans-serif;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0;
            /* <-- Apparently some margin are still there even though it's hidden */
        }

        input[type=number] {
            -moz-appearance: textfield;
            /* Firefox */
        }

        input {
            direction: ltr !important
        }
    </style>
    @stack('pushcss')

</head>

<body data-layout="horizontal" data-topbar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="/dashboard" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/s.png') }}" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/s2.png') }}" alt="" height="24"> <span
                                    class="logo-txt">تيسير</span>
                            </span>
                        </a>

                        <a href="/dashboard" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/s.png') }}" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/s2.png') }}" alt="" height="24"> <span
                                    class="logo-txt">تيسير</span>
                            </span>
                        </a>
                    </div>

                    <button type="button"
                        class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                        data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>


                </div>

                <div class="d-flex">

                    {{-- <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="search" class="icon-lg"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">

                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">

                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> --}}

                    {{-- <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img id="header-lang-img" src="{{ asset('/assets/images/flags/us.jpg')}}" alt="Header Language"
                                height="16">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
                                <img src="{{ asset('/assets/images/flags/us.jpg')}}" alt="user-image" class="me-1" height="12">
                                <span class="align-middle">English</span>
                            </a>
                            <!-- item-->
                        </div>
                    </div> --}}

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item" id="mode-setting-btn">
                            <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                            <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon position-relative"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i data-feather="bell" class="icon-lg"></i>
                            <span class="badge bg-danger rounded-pill">{{ $new_notifications->count() }}</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> الاشعارات </h6>
                                    </div>
                                    <div class="col-auto">

                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                @if ($new_notifications->count() != 0)
                                    <a href="#!" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <img src="{{ asset('notification.png') }}"
                                                class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">{{ $new_notifications->title }}</h6>
                                                <div class="font-size-13 text-muted">
                                                    <p class="mb-1">{{ $new_notifications->details }}</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>{{ $new_notifications->created_at->diffForHumans(); }}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                <div class="text-center">
                                    لا توجد اشعارات
                                </div>
                                @endif
                                {{--
                                    <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <img src="assets/images/users/avatar-3.jpg"
                                            class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">James Lemire</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">It will seem like simplified English.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours
                                                        ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-sm me-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="bx bx-cart"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your order is placed</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min
                                                        ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-sm me-3">
                                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                                <i class="bx bx-badge-check"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your item is shipped</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min
                                                        ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <img src="assets/images/users/avatar-6.jpg"
                                            class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Salena Layfield</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">As a skeptical Cambridge friend of mine occidental.
                                                </p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours
                                                        ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a> --}}
                            </div>
                            {{-- <div class="p-2 border-top d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-right-circle me-1"></i> <span>قراءة المزيد</span>
                                </a>
                            </div> --}}
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-soft-light border-start border-end"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('storage/' .auth()->guard('beneficiaries')->user()->image) }}"
                                alt="Header Avatar">
                            <span
                                class="d-none d-xl-inline-block ms-1 fw-medium">{{ auth()->guard('beneficiaries')->user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                    class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> البروفايل</a>
                            {{-- <a class="dropdown-item" href="auth-lock-screen.html"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock screen</a> --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i
                                    class="mdi mdi-logout font-size-16 align-middle me-1"></i> تسجيل خروج</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            @if (Auth::guard('beneficiaries')->user()->is_sign_up == 1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="/dashboard"
                                        id="topnav-dashboard" role="button">
                                        <i data-feather="home"></i><span data-key="t-dashboard">لوحة التحكم</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="/form-requests"
                                        id="topnav-dashboard" role="button">
                                        <i data-feather="file-text"></i><span data-key="t-dashboard">طلبات
                                            التمويل</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="/loans"
                                        id="topnav-dashboard" role="button">
                                        <i class="fa fa-cubes me-1"></i><span data-key="t-dashboard"> القروض</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="/installments"
                                        id="topnav-dashboard" role="button">
                                        <i class="fa fa-money-bill-alt me-1"></i><span data-key="t-dashboard">
                                            الأقساط</span>
                                    </a>
                                </li>
                                {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="index.html"
                                    id="topnav-dashboard" role="button">
                                    <i class="fa fa-cogs me-1"></i><span data-key="t-dashboard"> مشاريعي</span>
                                </a>
                            </li> --}}
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('content')
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Tayseer.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by <a href="https://tjoint-smart.com"
                                    class="text-decoration-underline">Tayseer finance Solution</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center p-3">

                <h5 class="m-0 me-2">Theme Customizer</h5>

                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            <hr class="m-0" />

            <div class="p-4">
                <h6 class="mb-3">Select Custome Colors</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode" id="theme-default"
                        value="default" onchange="document.documentElement.setAttribute('data-theme-mode', 'default')"
                        checked>
                    <label class="form-check-label" for="theme-default">Default</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode" id="theme-red"
                        value="red" onchange="document.documentElement.setAttribute('data-theme-mode', 'red')">
                    <label class="form-check-label" for="theme-red">Red</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode" id="theme-purple"
                        value="purple" onchange="document.documentElement.setAttribute('data-theme-mode', 'purple')">
                    <label class="form-check-label" for="theme-purple">Purple</label>
                </div>


                <h6 class="mt-4 mb-3 pt-2">Layout</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout" id="layout-vertical"
                        value="vertical">
                    <label class="form-check-label" for="layout-vertical">Vertical</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout" id="layout-horizontal"
                        value="horizontal">
                    <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light"
                        value="light">
                    <label class="form-check-label" for="layout-mode-light">Light</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark"
                        value="dark">
                    <label class="form-check-label" for="layout-mode-dark">Dark</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fuild"
                        value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                    <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed"
                        value="boxed"
                        onchange="document.body.setAttribute('data-layout-size', 'boxed'),document.body.setAttribute('data-sidebar-size', 'sm')">
                    <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-position" id="layout-position-fixed"
                        value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                    <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-position"
                        id="layout-position-scrollable" value="scrollable"
                        onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                    <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light"
                        value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                    <label class="form-check-label" for="topbar-color-light">Light</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark"
                        value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                    <label class="form-check-label" for="topbar-color-dark">Dark</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default"
                        value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                    <label class="form-check-label" for="sidebar-size-default">Default</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact"
                        value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                    <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small"
                        value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                    <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light"
                        value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                    <label class="form-check-label" for="sidebar-color-light">Light</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark"
                        value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                    <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-brand"
                        value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                    <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-ltr"
                        value="ltr">
                    <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-rtl"
                        value="rtl">
                    <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                </div>



            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/feather-icons/feather.min.js') }}"></script>
    <!-- pace js -->
    <script src="{{ asset('/assets/libs/pace-js/pace.min.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Plugins js-->
    <script src="{{ asset('/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}">
    </script>

    <script src="{{ asset('/assets/js/pages/allchart.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ asset('/assets/js/pages/dashboard.init.js') }}"></script>

    <script src="{{ asset('/assets/js/app.js') }}"></script>
    @stack('pushjs')
</body>

</html>
