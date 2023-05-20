<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> -->

    <!-- Title -->
    <title>Shifat telegram</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('frontend/img/logo.png')}}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">

</head>

<body>
@php
  $programs =  DB::table('programs')
  ->orderBy('id', 'Desc')
  ->first();
  @endphp
    <!-- Preloader -->
    <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>

    <!-- Subscribe Modal -->
    <div class="subscribe-newsletter-area">
        <div class="modal fade" id="subsModal" tabindex="-1" role="dialog" aria-labelledby="subsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="modal-body">
                        <h5 class="title">Subscribe to my newsletter</h5>
                        <form action="#" class="newsletterForm" method="post">
                            <input type="email" name="email" id="subscribesForm2" placeholder="Your e-mail here">
                            <button type="submit" class="btn original-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header py-lg-1 my-auto">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Breaking News Area -->
                    <div class="col-3 col-sm-3 py-0">
                        <div class="subscribe-btn py-0">
                            <a href="#" class="btn btn-sm subscribe-btn text-white border border-1 border-warning" data-toggle="modal" data-target="#subsModal">Subscribe</a>
                        </div>
                        <!-- <a href="index.html" class="original-log"><img src="img/logo.png" alt="" style="height: 60px;"></a> -->
                    </div>

                    <!-- Breaking News Area -->
                    <div class="col-5 col-sm-5">
                        <div class="breaking-news-area">
                            <div id="breakingNewsTicker" class="ticker mx-auto">
                                <ul class=" mx-auto text-center">
                                    <li><a href="#">Our Next Program</a></li> 
                                    <li><a href="#">{{date('d-m-Y',strtotime($programs->date))}} </a></li>
                                    <li><a href="#">{{date('h:i A',strtotime($programs->date))}} </a></li>
                                    <li><a href="#">Timejune:  GMT</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Top Social Area -->
                    <div class="col-4 col-sm-4">
                        <div class="top-social-area">
                            <!-- <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a> -->
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook text-white" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter text-white" aria-hidden="true"></i></a>
                            <!-- <a href="#" data-toggle="tooltip" data-placement="bottom" title="Dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a> -->
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Behance"><i class="fa fa-telegram text-white" aria-hidden="true"></i></a>
                            <!-- <a href="#" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> -->
        <script>
        $( document ).ready(function() {
            $(".navbarToggler").click(function () {
                $(this).hide();
                $(".cross-wrap").show();
            });
            $(".cross-wrap").click(function () {
                $(this).hide();
                $(".navbarToggler").show();
            });

        });
        </script>


        <!-- Nav Area -->
        <div class="original-nav-area border-bottom py-0 my-0" id="stickyNav">
            <div class="classy-nav-container breakpoint-off py-0 my-0">
                <div class="container py-0 my-0">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between py-0 my-0">
                        <a href="/" class="original-log"><img src="{{asset('frontend/img/logo.png')}}" alt="" style="height: 60px;"></a>

                        <!-- Subscribe btn -->
                        <!-- <div class="subscribe-btn">
                            <a href="#" class="btn subscribe-btn" data-toggle="modal" data-target="#subsModal">Subscribe</a>
                        </div> -->

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu" id="originalNav">
                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="/">Home</a></li>
                                            <li><a href="{{route('about')}}">About Us</a></li>
                                            <li><a href="{{route('contact')}}">Contact</a></li>
                                            <li><a href="{{route('commingsoon')}}">Coming Soon</a></li>
                                        </ul>
                                    </li>
                                    <!-- <li><a href="#">Catagory</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Catagory 1</a></li>
                                            <li><a href="#">Catagory 1</a></li>
                                            <li><a href="#">Catagory 1</a>
                                                <ul class="dropdown">
                                                    <li><a href="#">Catagory 2</a></li>
                                                    <li><a href="#">Catagory 2</a></li>
                                                    <li><a href="#">Catagory 2</a>
                                                        <ul class="dropdown">
                                                            <li><a href="#">Catagory 3</a></li>
                                                            <li><a href="#">Catagory 3</a></li>
                                                            <li><a href="#">Catagory 3</a></li>
                                                            <li><a href="#">Catagory 3</a></li>
                                                            <li><a href="#">Catagory 3</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Catagory 2</a></li>
                                                    <li><a href="#">Catagory 2</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Catagory 1</a></li>
                                            <li><a href="#">Catagory 1</a></li>
                                        </ul>
                                    </li> -->

                                    <li><a href="{{route('commingsoon')}}">Coming Soon</a></li>
                                    <li><a href="{{route('about')}}">About Us</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                    <!-- <li><a href="#">Megamenu</a>
                                        <div class="megamenu">
                                            <ul class="single-mega cn-col-4">
                                                <li class="title">Headline 1</li>
                                                <li><a href="#">Mega Menu Item 1</a></li>
                                                <li><a href="#">Mega Menu Item 2</a></li>
                                                <li><a href="#">Mega Menu Item 3</a></li>
                                                <li><a href="#">Mega Menu Item 4</a></li>
                                                <li><a href="#">Mega Menu Item 5</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li class="title">Headline 2</li>
                                                <li><a href="#">Mega Menu Item 1</a></li>
                                                <li><a href="#">Mega Menu Item 2</a></li>
                                                <li><a href="#">Mega Menu Item 3</a></li>
                                                <li><a href="#">Mega Menu Item 4</a></li>
                                                <li><a href="#">Mega Menu Item 5</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li class="title">Headline 3</li>
                                                <li><a href="#">Mega Menu Item 1</a></li>
                                                <li><a href="#">Mega Menu Item 2</a></li>
                                                <li><a href="#">Mega Menu Item 3</a></li>
                                                <li><a href="#">Mega Menu Item 4</a></li>
                                                <li><a href="#">Mega Menu Item 5</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li class="title">Headline 4</li>
                                                <li><a href="#">Mega Menu Item 1</a></li>
                                                <li><a href="#">Mega Menu Item 2</a></li>
                                                <li><a href="#">Mega Menu Item 3</a></li>
                                                <li><a href="#">Mega Menu Item 4</a></li>
                                                <li><a href="#">Mega Menu Item 5</a></li>
                                            </ul>
                                        </div>
                                    </li> --> 
                                </ul>

                                <!-- Search Form  -->
                                <div id="search-wrapper">
                                    <form action="#">
                                        <input type="text" id="search" placeholder="Search something...">
                                        <div id="close-icon"></div>
                                        <input class="d-none" type="submit" value="">
                                    </form>
                                </div>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->