<!doctype html>
<html lang="en-US">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <!-- Latest compiled and minified JavaScript -->
</head>

<body>
    <!-- loader Start -->
    <!-- loader END -->
    <!-- Header -->
    <header id="main-header">
        <div class="main-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <div class="navbar-toggler-icon" data-toggle="collapse">
                                    <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                                    <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                                    <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                                </div>
                            </a>
                            <a class="navbar-brand" href="index.html">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Movie</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="text-danger">List</h3>
                                    </div>
                                </div>
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="menu-main-menu-container">
                                    <ul id="top-menu" class="navbar-nav ml-auto">
                                        <li class="menu-item">
                                            <a href="{{ route('home') }}">Home</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('movies') }}">Movies</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('actors') }}">Actors</a>
                                        </li>
                                        @auth
                                            @if (auth()->user()->role == 1)
                                                <li class="menu-item">
                                                    <a href="{{ route('watch_lists') }}">Watch lists</a>
                                                </li>
                                            @endif
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                            {{-- <div class="mobile-more-menu">
                                <a href="javascript:void(0);" class="more-toggle" id="dropdownMenuButton"
                                    data-toggle="more-toggle" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-more-line"></i>
                                </a>
                                <div class="more-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="navbar-right position-relative">
                                        <ul class="d-flex align-items-center justify-content-end list-inline m-0">
                                            <li>
                                                <a href="#" class="search-toggle">
                                                    <i class="ri-search-line"></i>
                                                </a>
                                                <div class="search-box iq-search-bar">
                                                    <form action="#" class="searchbox">
                                                        <div class="form-group position-relative">
                                                            <input type="text" class="text search-input font-size-12"
                                                                placeholder="type here to search...">
                                                            <i class="search-link ri-search-line"></i>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="iq-user-dropdown search-toggle d-flex align-items-center">
                                                    <img src="images/user/user.jpg"
                                                        class="img-fluid avatar-40 rounded-circle" alt="user">
                                                </a>
                                                <div class="iq-sub-dropdown iq-user-dropdown">
                                                    <div class="iq-card shadow-none m-0">
                                                        <div class="iq-card-body p-0 pl-3 pr-3">
                                                            <a href="manage-profile.html"
                                                                class="iq-sub-card setting-dropdown">
                                                                <div class="media align-items-center">
                                                                    <div class="right-icon">
                                                                        <i class="ri-file-user-line text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0 ">Manage Profile</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="setting.html" class="iq-sub-card setting-dropdown">
                                                                <div class="media align-items-center">
                                                                    <div class="right-icon">
                                                                        <i class="ri-settings-4-line text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0 ">Settings</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="pricing-plan.html"
                                                                class="iq-sub-card setting-dropdown">
                                                                <div class="media align-items-center">
                                                                    <div class="right-icon">
                                                                        <i class="ri-settings-4-line text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0 ">Pricing Plan</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="login.html" class="iq-sub-card setting-dropdown">
                                                                <div class="media align-items-center">
                                                                    <div class="right-icon">
                                                                        <i
                                                                            class="ri-logout-circle-line text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0">Logout</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="navbar-right menu-right">
                                <ul class="d-flex align-items-center list-inline m-0 top-menu">
                                    @guest
                                        <li class="menu-item">
                                            <a href="{{ route('login') }}">
                                                Sign in
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('register') }}">
                                                Sign up
                                            </a>
                                        </li>
                                    @else
                                        <li class="nav-item nav-icon">
                                            <a href="#" class="iq-user-dropdown search-toggle p-0 d-flex align-items-center"
                                                data-toggle="search-toggle">
                                                <img src="{{ asset('images/user') }}/{{ auth()->user()->image }}"
                                                    class="img-fluid avatar-40 rounded-circle" alt="user">
                                            </a>
                                            <div class="iq-sub-dropdown iq-user-dropdown">
                                                <div class="iq-card shadow-none m-0">
                                                    <div class="iq-card-body p-0 pl-3 pr-3">
                                                        <a href="{{ route('profile') }}" class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="media-body ml-3">
                                                                    <h6 class="my-0 ">Profile</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                              document.getElementById('logout-form').submit();"
                                                            class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="media-body ml-3">
                                                                    <h6 class="my-0 ">Logout</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </nav>
                        <div class="nav-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Slider Start -->
    <main class="py-4">
        @yield('content')
    </main>

    <footer id="contact" class="footer-one iq-bg-dark">

        <!-- Address -->
        <div class="footer-top">
            <div class="container-fluid">
                <div class="row footer-standard">
                    <div class="col-md-6">
                        <div class="widget text-left">
                            <div class="menu-footer-link-1-container">
                                <ul id="menu-footer-link-1" class="menu p-0">
                                    <li id="menu-item-7314"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7314">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li id="menu-item-7316"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7316">
                                        <a href="{{ route('movies') }}">Movies</a>
                                    </li>
                                    <li id="menu-item-7118"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7118">
                                        <a href="{{ route('actors') }}">Actor</a>
                                    </li>
                                    @auth
                                        @if (auth()->user()->role == 1)
                                            <li id="menu-item-7118"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7118">
                                                <a href="{{ route('watch_lists') }}">Watch List</a>
                                            </li>
                                        @endif
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="widget text-right">
                            <div class="textwidget">
                                <p><small>CopyRight © 2021 movielist</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Address END -->
    </footer>

    <!-- MainContent End-->
    <!-- back-to-top -->
    <div id="back-to-top">
        <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
    </div>
    <!-- back-to-top End -->
    <!-- jQuery, Popper JS -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/slick-animation.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    @yield('script')

</body>

</html>
