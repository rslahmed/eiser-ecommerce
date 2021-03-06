<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Eiser ecommerce</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/vendors/linericon/style.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/vendors/lightbox/simpleLightbox.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/vendors/nice-select/css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/vendors/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/vendors/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}" />

    @yield('style')
</head>

<body>
<div class="preloader">
    <img src="{{asset('preloader.gif')}}">
</div>


<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="top_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="float-left">
                        <p>Phone: +01 256 25 235</p>
                        <p>email: info@eiser.com</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="float-right">
                        <ul class="right_side">
                            <li>
                                <a href="#">
                                    gift card
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    track order
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('home')}}">
                    <img src="{{asset('frontend/img/logo.png')}}" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                    <div class="row w-100 mr-0 align-items-center">
                        <div class="col-lg-7 pr-0">
                            <ul class="nav navbar-nav center_nav pull-right">
                                <li class="nav-item @if(Request::is('/')) active @endif">
                                    <a class="nav-link" href="{{route('home')}}">Home</a>
                                </li>
                                <li class="nav-item @if(Request::is('shop')) active @endif">
                                    <a class="nav-link" href="{{route('shop')}}">Shop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-5 pr-0">
                            <ul class="nav navbar-nav navbar-right right_nav pull-right align-items-center">
                                <li class="nav-item">
                                    <a href="#" class="icons">
                                        <i class="ti-search" aria-hidden="true"></i>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('carts')}}" class="icons carts-icon position-relative">
                                        <i class="ti-shopping-cart"></i>
                                        <span class="cart-tag" id="cartCount">@auth {{auth()->user()->myCartsCount()}} @else 0 @endif</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="icons">
                                        <i class="ti-heart" aria-hidden="true"></i>
                                    </a>
                                </li>

                                <li class="dropdown nav-item d-inline-block">
                                    <a class="icons dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-user" aria-hidden="true"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @auth()
                                            @if(auth()->user()->role === 1)
                                                <a class="dropdown-item" href="{{route('admin.home')}}">Admin</a>
                                            @endif
                                            <a class="dropdown-item" href="{{route('user.profile')}}">Profile</a>
                                            <a class="dropdown-item" href="{{route('orders')}}">Orders</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Logout</button>
                                            </form>
                                        @endauth
                                        @guest()
                                            <a class="dropdown-item" href="{{url('/login')}}">Login</a>
                                            <a class="dropdown-item" href="{{url('/register')}}">Signup</a>
                                        @endguest

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--================Header Menu Area =================-->

@yield('content')

<!--================ start footer Area  =================-->
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Top Products</h4>
                <ul>
                    <li><a href="#">Managed Website</a></li>
                    <li><a href="#">Manage Reputation</a></li>
                    <li><a href="#">Power Tools</a></li>
                    <li><a href="#">Marketing Service</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Brand Assets</a></li>
                    <li><a href="#">Investor Relations</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Features</h4>
                <ul>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Brand Assets</a></li>
                    <li><a href="#">Investor Relations</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#">Guides</a></li>
                    <li><a href="#">Research</a></li>
                    <li><a href="#">Experts</a></li>
                    <li><a href="#">Agencies</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>Newsletter</h4>
                <p>You can trust us. we only send promo offers,</p>
                <div class="form-wrap">
                    <form action="{{route('subscriber.store')}}" method="post" class="form-inline">
                        @csrf
                        <input class="form-control" name="email" placeholder="Your Email Address" required="" type="email">
                        <button type="submit" class="click-btn btn btn-default">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-12">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i></p>
            <div class="col-lg-4 col-md-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/stellar.js')}}"></script>
<script src="{{asset('frontend/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{asset('frontend/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('frontend/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/vendors/isotope/isotope-min.js')}}"></script>
<script src="{{asset('frontend/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/vendors/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{asset('frontend/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('frontend/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('frontend/vendors/counter-up/jquery.counterup.js')}}"></script>
<script src="{{asset('frontend/js/mail-script.js')}}"></script>
<script src="{{asset('frontend/js/theme.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    $(document).ready(function(){
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        // notification push
        @if($errors->any())
            @foreach ($errors->all() as $error)
            toastr["error"]("{{ $error }}")
        @endforeach
            @endif

            @if(Session::has('success'))
            toastr["success"]("{{ Session::get('success') }}")
        @endif

            @if(Session::has('error'))
            toastr["error"]("{{ Session::get('error') }}")
        @endif
    })

    function showLoader(){
        $('.preloader').addClass('active')
    }

    function hideLoader(){
        $('.preloader').removeClass('active')
    }
</script>
@yield('script')
</body>

</html>
