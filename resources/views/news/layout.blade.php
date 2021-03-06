<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <!-- plugin css for this page -->
    <link
        rel="stylesheet"
        href="/assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" href="/assets/vendors/aos/dist/aos.css/aos.css" />
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="/assets/images/favicon.png" />
    <!-- inject:css -->
    <link rel="stylesheet" href="/assets/css/style.css">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>--}}

    <!-- endinject -->
</head>
<body>
    <div class="container-scroller">
        <div class="main-panel">
            <!-- partial:partials/_navbar.html -->
            <header id="header">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="navbar-top">
                            <div class="d-flex justify-content-between align-items-center">
                                <ul class="navbar-top-left-menu">
                                    <li class="nav-item">
                                        <a href="/index-inner.blade.php" class="nav-link">Advertise</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="aboutus.blade.php" class="nav-link">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Write for Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">In the Press</a>
                                    </li>
                                </ul>
                                <ul class="navbar-top-right-menu">
                                    <li class="nav-item">
                                        <form class="d-flex" action="{{route('search')}}" method="get">
                                            <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-light" type="submit">Search</button>
                                        </form>
                                    </li>
                                    @if(auth()->check())
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">{{auth()->user()->name}}</a>
                                            <form action="{{route('login.destroy',auth()->id())}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="nav-link btn">Logout</button>
                                            </form>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a href="{{route('login.index')}}" class="nav-link">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('register.index')}}" class="nav-link">Sign up</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="navbar-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a class="navbar-brand" href="{{route('home')}}"
                                    ><img src="/assets/images/logo.svg" alt=""
                                        /></a>
                                </div>
                                <div>
                                    <button
                                        class="navbar-toggler"
                                        type="button"
                                        data-target="#navbarSupportedContent"
                                        aria-controls="navbarSupportedContent"
                                        aria-expanded="false"
                                        aria-label="Toggle navigation"
                                    >
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div
                                        class="navbar-collapse justify-content-center collapse"
                                        id="navbarSupportedContent"
                                    >
                                        <ul
                                            class="navbar-nav d-lg-flex justify-content-between align-items-center"
                                        >
                                            <li>
                                                <button class="navbar-close">
                                                    <i class="mdi mdi-close"></i>
                                                </button>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="{{route('home')}}">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">MAGAZINE</a>
                                            </li>
                                            @foreach(\App\Models\Rubric::all() as $rubric)
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('page',$rubric->name)}}">{{$rubric->name}}</a>
                                                </li>
                                            @endforeach
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Contact</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="social-media">
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>

            <div>
                @if(session('error'))
                    <div class="alert alert-danget">
                        {{session('error')}}
                    </div>
                @endif
            </div>
            <!-- main-panel ends -->
            <!-- container-scroller ends -->

            @yield('content')

            <!-- partial:partials/_footer.html -->
            <footer>
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5">
                                <img src="assets/images/logo.svg" class="footer-logo" alt="" />
                                <h5 class="font-weight-normal mt-4 mb-5">
                                    Newspaper is your news, entertainment, music fashion website. We
                                    provide you with the latest breaking news and videos straight from
                                    the entertainment industry.
                                </h5>
                                <ul class="social-media mb-3">
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="footer-border-bottom pb-2">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img
                                                        src="/assets/images/dashboard/home_1.jpg"
                                                        alt="thumb"
                                                        class="img-fluid"
                                                    />
                                                </div>
                                                <div class="col-9">
                                                    <h5 class="font-weight-600">
                                                        Cotton import from USA to soar was American traders
                                                        predict
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="footer-border-bottom pb-2 pt-2">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img
                                                        src="/assets/images/dashboard/home_2.jpg"
                                                        alt="thumb"
                                                        class="img-fluid"
                                                    />
                                                </div>
                                                <div class="col-9">
                                                    <h5 class="font-weight-600">
                                                        Cotton import from USA to soar was American traders
                                                        predict
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <img
                                                        src="/assets/images/dashboard/home_3.jpg"
                                                        alt="thumb"
                                                        class="img-fluid"
                                                    />
                                                </div>
                                                <div class="col-9">
                                                    <h5 class="font-weight-600 mb-3">
                                                        Cotton import from USA to soar was American traders
                                                        predict
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
                                <div class="footer-border-bottom pb-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0 font-weight-600">Magazine</h5>
                                        <div class="count">1</div>
                                    </div>
                                </div>
                                <div class="footer-border-bottom pb-2 pt-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0 font-weight-600">Business</h5>
                                        <div class="count">1</div>
                                    </div>
                                </div>
                                <div class="footer-border-bottom pb-2 pt-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0 font-weight-600">Sports</h5>
                                        <div class="count">1</div>
                                    </div>
                                </div>
                                <div class="footer-border-bottom pb-2 pt-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0 font-weight-600">Arts</h5>
                                        <div class="count">1</div>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0 font-weight-600">Politics</h5>
                                        <div class="count">1</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <div class="fs-14 font-weight-600">
                                        ?? 2020 @ <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white"> BootstrapDash</a>. All rights reserved.
                                    </div>
                                    <div class="fs-14 font-weight-600">
                                        Handcrafted by <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white">BootstrapDash</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- partial -->
        </div>
    </div>
    <!-- inject:js -->
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->

    <script src="/assets/vendors/aos/dist/aos.js/aos.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="/assets/js/demo.js"></script>
    <script src="/assets/js/jquery.easeScroll.js"></script>
</body>
</html>
