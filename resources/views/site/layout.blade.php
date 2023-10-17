<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <title>Fashion Store</title>
        <link rel="stylesheet" type="text/css" href="{{asset('sitestyle/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('sitestyle/assets/css/font-awesome.css')}}">
        <link rel="stylesheet" href="{{asset('sitestyle/assets/css/templatemo-hexashop.css')}}">
        <link rel="stylesheet" href="{{asset('sitestyle/assets/css/owl-carousel.css')}}">
        <link rel="stylesheet" href="{{asset('sitestyle/assets/css/lightbox.css')}}">
    </head>
    <body>
        <div id="preloader">
            <div class="jumper">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <header class="header-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                            <a href="index.html" class="logo">
                                <img src="{{asset('sitestyle/assets/images/logo.png')}}">
                            </a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <li><a href="{{route('/home')}}">Home</a></li>
                                <li><a href="{{route('/user/ourproduct')}}">Our Products</a></li>
                                <li><a href="{{route('/user/aboutus')}}">About Us</a></li>
                                <li><a href="{{route('/user/contactus')}}">Contact Us</a></li>
                                <li><a href="{{route('/cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                <li class="nav-item px-3 d-flex align-items-center">
                                    <div  aria-labelledby="navbarDropdown">
                                        <a  href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="first-item">
                            <div class="logo">
                                <img src="{{asset('sitestyle/assets/images/white-logo.png')}}" alt="logo">
                            </div>
                            @if ($message = session()->get('footer'))
                            <ul>
                                <li><a href="#">{{$message['Store_Location']}}</a></li>
                                <li><a href="#">{{$message['Email']}}</a></li>
                                <li><a href="#">{{$message['Phone']}}</a></li>
                            </ul>
                             @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <h4>Shopping &amp; Categories</h4>
                        <ul>
                            <li><a href="#">Men’s Shopping</a></li>
                            <li><a href="#">Women’s Shopping</a></li>
                            <li><a href="#">Kid's Shopping</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="{{route('/home')}}">Homepage</a></li>
                            <li><a href="{{route('/user/ourproduct')}}">Our Products</a></li>
                            <li><a href="{{route('/user/aboutus')}}">About Us</a></li>
                            <li><a href="{{route('/user/contactus')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h4>Help &amp; Information</h4>
                        <ul>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Tracking ID</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-12">
                        <div class="under-footer">
                            <p>Copyright © 2023 HexaShop.
                            <br>Developed by Ibrahim Al_Kousa</p>
                            @if ($message = session()->get('footer'))
                            <ul>
                                <li><a href="{{$message['Facebook']}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$message['Instagram']}}"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="{{$message['Behance']}}"><i class="fa fa-behance"></i></a></li>
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- jQuery -->
        <script src="{{asset('sitestyle/assets/js/jquery-2.1.0.min.js')}}"></script>

        <!-- Bootstrap -->
        <script src="{{asset('sitestyle/assets/js/popper.js')}}"></script>
        <script src="{{asset('sitestyle/assets/js/bootstrap.min.js')}}"></script>
        <!-- Plugins -->
        <script src="{{asset('sitestyle/assets/js/owl-carousel.js')}}"></script>
        <script src="{{asset('sitestyle/assets/js/accordions.js')}}"></script>
        <script src="{{asset('sitestyle/assets/js/datepicker.js')}}"></script>
        <script src="{{asset('sitestyle/assets/js/scrollreveal.min.js')}}"></script>
        <script src="{{asset('sitestyle/assets/js/waypoints.min.js')}}"></script>
        <script src="{{asset('sitestyle/assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('sitestyle/assets/js/imgfix.min.js')}}"></script>
        <script src="{{asset('sitestyle/assets/js/slick.js')}}"></script>
        <script src="{{asset('sitestyle/assets/js/lightbox.js')}}"></script>
        <script src="{{asset('sitestyle/assets/js/isotope.js')}}"></script>

        <!-- Global Init -->
        <script src="{{asset('sitestyle/assets/js/custom.js')}}"></script>

        <script>

            $(function() {
                var selectedClass = "";
                $("p").click(function(){
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                    $("#portfolio div").not("."+selectedClass).fadeOut();
                setTimeout(function() {
                  $("."+selectedClass).fadeIn();
                  $("#portfolio").fadeTo(50, 1);
                }, 500);

                });
            });

        </script>
    </body>
</html>
