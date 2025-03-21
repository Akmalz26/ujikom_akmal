<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{asset('frontend/css/tiny-slider.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <title>ZetaShop</title>
</head>

<body>
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="frontend/index.html">Zeta Shop<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li  class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                        <a class="nav-link" href="/shop">Shop</a>
                    </li>
                </ul>
                @guest <!-- Periksa apakah pengguna belum login -->
                    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                        <li><a class="nav-link" href="/login">Login</a></li>
                        <li><a class="nav-link" href="/register">Register</a></li>
                    </ul>
                @endguest <!-- Akhir dari pengecekan tamu -->

                @auth <!-- Periksa apakah pengguna sudah login -->
                    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('frontend/images/user.svg')}}">
                            </a>
                            <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                <!-- Item dropdown-nya bisa Anda tambahkan di sini -->
                                <li><a class="dropdown-item text-light" href="{{ route('profile')}}">Profil</a></li>
                                <li><a class="dropdown-item text-light" href="{{ route('history')}}">History</a></li>
                                <li>
                                    <hr class="dropdown-divider text-light">
                                </li>
                                <li><a class="dropdown-item text-light" href="{{ url('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <?php
                             $penjualan_utama = \App\Models\Penjualan::where('user_id', auth()->user()->id)->where('status',0)->first();
                             if(!empty($penjualan_utama))
                                {
                                 $notif = \App\Models\DetailPenjualan::where('penjualan_id', $penjualan_utama->id)->count(); 
                                }
                            ?>
                            <a class="position-relative nav-link" href="{{ url('cart') }}">
                            <!-- <img src="images/cart.svg"> -->
                            <img src="{{asset('frontend/images/cart.svg')}}">
                                @if(!empty($notif))
                                <span class="position-absolute top-2 start-100 translate-middle badge rounded-pill bg-danger">{{ $notif }}</span>
                                @endif
                            </a>
                        </li>
                        {{-- <li><a class="nav-link" href="{{route('cart')}}"><img src="{{asset('frontend/images/cart.svg')}}"></a></li> --}}
                    </ul>
                @endauth <!-- Akhir dari pengecekan otentikasi pengguna -->
            </div>
        </div>

    </nav>
    <!-- End Header/Navigation -->

    @yield('content')


    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">

            {{-- <div class="sofa-img">
                <img src="frontend/images/bg3.png" alt="Image" class="img-fluid">
            </div> --}}

            <div class="row">
                <div class="col-lg-8">
                    <div class="subscription-form">
                        <h3 class="d-flex align-items-center"><span class="me-1"><img
                                    src="frontend/images/envelope-outline.svg" alt="Image"
                                    class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

                        <form action="#" class="row g-3">
                            <div class="col-auto">
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="col-auto">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary">
                                    <span class="fa fa-paper-plane"></span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Zeta
                            Shop<span>.</span></a></div>
                    <p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus
                        malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.
                        Pellentesque habitant</p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Knowledge base</a></li>
                                <li><a href="#">Live chat</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Our team</a></li>
                                <li><a href="#">Leadership</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Nordic Chair</a></li>
                                <li><a href="#">Kruzo Aero</a></li>
                                <li><a href="#">Ergonomic Chair</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>. All Rights Reserved.
                        </p>

            <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('frontend/js/tiny-slider.js')}}"></script>
            <script src="{{asset('frontend/frontend/js/custom.js')}}"></script>
</body>

</html>
