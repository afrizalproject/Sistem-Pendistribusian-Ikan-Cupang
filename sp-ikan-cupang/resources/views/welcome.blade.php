<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Sister Pendistribusian Ikan Cupang</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('landing/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('landing/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('landing/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>
<!-- body -->

<body class="main-layout">

    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="head_top">
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                            <div class="full">
                                <div class="center-desk">
                                    <div class="logo">
                                        <a href="/"><img src="{{ asset('landing/images/top_img.png') }}"
                                                style="height: 70px" alt="#" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarsExample04">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/"> Home </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#best">About</a>
                                        </li>
                                    </ul>
                                    @if (Route::has('login'))
                                        <div class="sign_btn">
                                            @auth
                                                <a href="{{ url('/home') }}"
                                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                                            @else
                                                <a href="{{ route('login') }}"
                                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}"
                                                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                                @endif
                                            @endauth
                                        </div>
                                    @endif

                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header inner -->
            <!-- end header -->
            <!-- banner -->
            <section class="banner_main">
                <div class="container-fluid">
                    <div class="row d_flex">
                        <div class="col-md-5">
                            <div class="text-bg">
                                <h1>Cupang Shop</h1>
                                <strong>Free Multipurpose Responsive</strong>
                                <span>Landing Page 2019</span>
                            </div>
                        </div>
                        <div class="col-md-7 padding_right1">
                            <div class="text-img">
                                <figure><img src="{{ asset('landing/images/top_img.png') }}" height="800px" alt="#" />
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </header>
    <!-- end banner -->

    <!-- best -->
    <div id="best" class="best">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>About Us </h2>
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="best_box">
                        <h4>Cupang<br>Super</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod t dolor in
                            reprehenderit in voluptate velit</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="best_box">
                        <h4>Cupang<br>Gabut</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod t dolor in
                            reprehenderit in voluptate velit</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="best_box">
                        <h4>Cupang<br>Legend</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod t dolor in
                            reprehenderit in voluptate velit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end best -->

    <!--  footer -->
    <footer id="contact">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="cont">
                            <h3> <strong class="multi"> Afrizal Rizky</strong><br>
                                AfrizalProject
                            </h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cont_call">
                            <h3> <strong class="multi"> Call Now</strong><br>
                                (+62) 12345667890
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>© 2021 All Rights Reserved. Design by AfrizalProject</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{ asset('landing/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('landing/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('landing/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('landing/js/custom.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>
