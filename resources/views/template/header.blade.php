<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="description" content="" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @php
  $company_information = DB::table('company_information')
  ->select('company_information.company_logo','company_information.phone1','company_information.email1','company_information.start_time','company_information.end_time')->first();
  $headers = DB::table('headers')->orderBy('sequense', 'ASC')->get();
  $programs =  DB::table('programs')->get();
  @endphp
  <!--====== Favicon Icon ======-->
  @if(isset($company_information->company_logo))
  <link rel="shortcut icon" href="{{asset('uploads/companyLogo/'.$company_information->company_logo)}}" type="image/x-icon">
  @endif
  <!--====== Google Fonts ======-->
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&amp;family=Oswald:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

  <!--====== Font Awesome ======-->
  <link rel="stylesheet" href="{{asset('frontend/css/font-awesome-5.9.0.css')}}">
  <!--====== Bootstrap ======-->
  <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
  <!--====== Magnific Popup ======-->
  <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
  <!--====== Falticon ======-->
  <link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}">
  <!--====== Animate ======-->
  <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
  <!--====== Slick ======-->
  <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
  <!--====== Main Style ======-->
  <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

  <!-- toastrr css -->
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

  <style>
    .gallery-item.style-three:hover .gallery-content {
      background: linear-gradient(355deg, #eedb32 -4%, #eedc33, #c79b28, #f1e03e 66%) !important;
    }

    .scroll-top {
      background: linear-gradient(355deg, #eedb32 -4%, #eedc33, #c79b28, #f1e03e 66%) !important;
      color: white !important;
    }

    .scroll-top:hover {
      background: linear-gradient(355deg, #ffe700 -4%, #eda00a, #d28a00, #ffc300 66%) !important;
      color: white !important;
    }

    .footer-top .contact-info li i {
      color: white;
      background: linear-gradient(355deg, #eedb32 -4%, #eedc33, #c79b28, #f1e03e 66%) !important;
      border-color: white;
    }

    .footer-top .contact-info li i:hover {
      color: white;
      background: linear-gradient(355deg, #ffe700 -4%, #eda00a, #d28a00, #ffc300 66%) !important;
      border-color: white;
    }


    .newsletter-widget form button {
      background: linear-gradient(355deg, #eedb32 -4%, #eedc33, #c79b28, #f1e03e 66%) !important;
    }

    .newsletter-widget form button:hover {
      background: linear-gradient(355deg, #ffe700 -4%, #eda00a, #d28a00, #ffc300 66%) !important;
    }

    .contact-image-number.style-two:before {
      background: linear-gradient(355deg, #eedb32 -4%, #eedc33, #c79b28, #f1e03e 66%) !important;
    }

    .header-upper {
      border: 0px !important;
    }

    .main-menu .navbar-collapse li.active {
      border-bottom: 2px solid #fde200 !important;
      margin-bottom: 0px !important;
    }



    .bg-blue {
      background: linear-gradient(355deg, #f1df36 -4%, #edd832, #cca22a, #e0c22f 66%) !important;
    }

    .work-progress-three.bg-gold {
      background: linear-gradient(355deg, #f1df36 -4%, #edd832, #cca22a, #e0c22f 66%) !important;
    }

    a.theme-btn,
    button.theme-btn {
      background: linear-gradient(355deg, #eedb32 -4%, #eedc33, #c79b28, #f1e03e 66%) !important;
    }

    a.theme-btn:hover,
    button.theme-btn:hover,
    li i:hover {
      background: linear-gradient(355deg, #ffe700 -4%, #eda00a, #d28a00, #ffc300 66%) !important;
    }


    .contact-image-number.style-two:before {
      background: linear-gradient(355deg, #fde200 -4%, #ffbc00, #eda00a, #ffc135 66%) !important;
    }


    .text-white .navbar-collapse>ul>li>a,
    .text-white .navbar-collapse>ul>li>a:hover,
    .text-white .navbar-collapse>ul>li.current>a {
      color: #ffcd08 !important;
    }

    .theme-btn,
    a.theme-btn {
      background: linear-gradient(355deg, #eedb32 -4%, #eedc33, #c79b28, #f1e03e 66%) !important;
      font-size: 14px !important;
      color: white !important;
      border-radius: 3px !important;
      padding: 5px 10px !important;
    }

    .main-menu .navbar-collapse li a.active {
      color: white !important;
      background: linear-gradient(355deg, #eedb32 -4%, #eedc33, #c79b28, #f1e03e 66%) !important;
      font-weight: bold !important;
    }

    .main-menu .navbar-collapse li a.active:hover {
      color: white !important;
      background: linear-gradient(355deg, #eedb32 -4%, #cab91b, #c79b28, #ffe705 66%) !important;
      font-weight: bold !important;
    }



    @if(Request::is('/')) .main-menu .navbar-collapse li .m1 {
      color: white !important;
      background: linear-gradient(355deg, #eedb32 -4%, #eedc33, #c79b28, #f1e03e 66%) !important;
      font-weight: bold !important;
      border-bottom: 0px !important;
    }

    .main-menu .navbar-collapse .m1 {
      border-bottom: 2px solid #fde200 !important;
      margin-bottom: 0px !important;
    }


    @endif .text-white .navbar-collapse>ul>li>a,
    .text-white .navbar-collapse>ul>li.current>a {
      padding: 5px 10px !important;
    }


    .text-white .navbar-collapse>ul>li>a,
    .text-white .navbar-collapse>ul>li.current>a {
      padding: 5px 10px !important;
    }

    .text-white .navbar-collapse>ul>li>a:hover {
      color: white !important;
      border-radius: 3px !important;
      transition: 0s !important;
      padding: 5px 10px !important;
      background: linear-gradient(355deg, #eedb32 -4%, #eedc33, #c79b28, #f1e03e 66%) !important;
    }

    @media only screen and (min-width: 1199px) {
      .main-menu .navbar-collapse li {
        padding: 30px 10px !important;
      }
    }

    .contact-info-item i {
      font-size: 40px;
      margin-bottom: 15px;
      display: inline-block;
      color: #ebd63b;
    }

    .contact-info-item i:hover {
      font-size: 40px;
      margin-bottom: 15px;
      display: inline-block;
      color: #f1e03e;
    }




    .header-three.fixed-header .header-upper {
      padding: 0px !important;

    }



    @media only screen and (max-width: 1199px) {
      .main-menu .navbar-collapse li {
        padding: 16px 15px !important;
      }
    }

    @media only screen and (max-width: 1500px) {
      .main-menu .navbar-collapse li {
        padding: 17px 15px !important;
      }
    }

    @media only screen and (min-width: 1501px) {
      .main-menu .navbar-collapse li {
        padding: 18px 15px !important;
      }


    }



    @media only screen and (max-width: 991px) {
      .main-menu .navbar-collapse {
        padding: 0 15px;
        position: absolute;
        background: transparent !important;
        border-bottom: 0px !important;
      }
    }

    @media only screen and (max-width: 991px) {
      .main-menu .navbar-collapse li {
        float: none;
        padding: 0 20px;
        background: white !important;
        border: 1px 0px solid #ffc135;
      }

      .main-menu .navbar-collapse li.active {
        display: block;
        margin-left: 0 !important;
        background: white !important;
        border-top: 1px solid #ffc135;
      }

    }

 
  </style>

</head>

<body>
  <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader">
      <div class="theme-loader"></div>
    </div>

    <!-- main header -->
    <header class="main-header header-three text-white">
      <div class="header-top-wrap bg-blue py-10">
        <div class="container">
          <div class="header-top">
            <div class="top-left">
              <ul>
                @if(isset($company_information->phone1))
                <li>Call Us: <a href="callto: {{$company_information->phone1}}"> {{$company_information->phone1}}</a></li>
                @endif

                @if(isset($company_information->email1))
                <li>E-mail: <a href="mailto: {{$company_information->email1}}">{{$company_information->email1}}</a></li>
                @endif



              </ul>
            </div>
            <div class="top-right">
              @if(isset($company_information->start_time))
              <div class="office-time">
                <i class="far fa-clock"></i><span>{{date('h:i A',strtotime($company_information->start_time))}} - {{date('h:i A',strtotime($company_information->end_time))}}</span>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>

      <!--Header-Upper-->
      <div class="header-upper">
        <div class="container clearfix">

          <div class="header-inner d-flex align-items-center">
            <div class="logo-outer">
              <div class="logo">
                @if(isset($company_information->company_logo))
                <a href="{{asset('home')}}"><img src="{{asset('uploads/companyLogo/'.$company_information->company_logo)}}" height="75px" width="75px" alt="{{$company_information->company_logo}}" title="{{$company_information->company_logo}}" style="border-radius:3px"></a>
                @endif
              </div>
            </div>

            <div class="nav-outer clearfix d-flex align-items-center">
              <!-- Main Menu -->
              <nav class="main-menu navbar-expand-lg">
                <div class="navbar-header">
                  <div class="mobile-logo py-15">

                    @if(isset($company_information->company_logo))
                    <a href="/">
                      <img src="{{asset('uploads/companyLogo/'.$company_information->company_logo)}}" alt="{{$company_information->company_logo}}" height="50px" width="50px" title="{{$company_information->company_logo}}">
                    </a>
                    @endif
                  </div>

                  <!-- Toggle Button -->
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>

                <div class="navbar-collapse collapse clearfix">
                  <ul class="navigation clearfix">

                    @foreach($headers as $key => $header)


                    <li class="{{Request::is($header->url) ? 'menu-btn active' : '' }} m{{$key+1}}">
                      <a href="{{$header->url}}" class="{{Request::is($header->url) ? 'theme-btn active' : '' }} m{{$key+1}}">
                        {{$header->menu_name}}
                      </a>
                    </li>
                    @endforeach
                    <!-- <li class="dropdown for-mega"><a href="#">Elements</a>
                                            <div class="megamenu">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6">
                                                            <h5 class="mega-title">Menu Title</h5>
                                                            <ul>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                            </ul>
                                                        </div> 
                                                        <div class="col-lg-3 col-md-6">
                                                            <h5 class="mega-title">Menu Title</h5>
                                                            <ul>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                            </ul>
                                                        </div> 
                                                        <div class="col-lg-3 col-md-6">
                                                            <h5 class="mega-title">Menu Title</h5>
                                                            <ul>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                            </ul>
                                                        </div> 
                                                        <div class="col-lg-3 col-md-6">
                                                            <h5 class="mega-title">Menu Title</h5>
                                                            <ul>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                                <li><a href="#">Menu item</a></li>
                                                            </ul>
                                                        </div>                                               
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                         -->
                  </ul>
                </div>

              </nav>
              <!-- Main Menu End-->

            </div>
          </div>
        </div>
      </div>
      <!--End Header Upper-->
    </header>